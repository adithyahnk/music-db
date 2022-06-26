<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use App\Models\Rating;
use App\Models\Song;
use App\Models\SongArtist;
use App\Models\User;
use Livewire\Component;

class HomeActions extends Component
{
    public $songArtists;

    public $songId, $songName;

    public $rating, $user;

    public $artistName;

    public $artistSongs;

    public function render()
    {
        $songs = Song::all()->sortByDesc('rating')->take(10);
        $artists = Artist::all()->sortByDesc('rating')->take(10);
        return view('livewire.home-actions',compact('songs','artists'));
    }

    /**
     * Set song Details
     * @param $id
     */
    public function setSong($id)
    {
        $this->songId = $id;
        $song = Song::find($id);
        $this->songName = $song->name;
    }

    /**
     * Reset Song Details
     */
    public function resetSong()
    {
        $this->songId = '';
        $this->songName = '';
        $this->rating = '';
        $this->user = '';
    }

    /**
     * Set song Id for artists modal
     * @param $id
     */
    public function setSongArtists($id)
    {
        $song = Song::find($id);
        $artistIds = SongArtist::where('song_id', $id)->pluck('artist_id')->toArray();
        $this->songArtists = Artist::whereIn('id', $artistIds)->get();
        $this->songName = $song->name;
    }

    /**
     * Rating feature
     * Insert user if user is not present in DB
     * If user present, fetch user id, rating from the form and insert rating
     * average song rating = sum of total song rating / count of ratings for the song
     * set average artist rating
     * average artist rating = sum of average rating of artist songs / count of artist songs.
     */
    public function rateSong()
    {
        $user = User::where('email', $this->user)->first();
        if (!isset($user)) {
            $user = User::create([
                'email' => $this->user
            ]);
        }
        Rating::create([
            'user_id' => $user->id,
            'song_id' => $this->songId,
            'rating' => $this->rating,
        ]);
        $song = Song::find($this->songId);

        $averageRating = $song->songRating()->sum('rating') / $song->songRating()->count();
        $song->rating = $averageRating;
        $song->save();

        $songArtistIds = SongArtist::where('song_id', $this->songId)->pluck('artist_id')->toArray();
        $artists = Artist::whereIn('id', $songArtistIds)->get();

        foreach ($artists as $artist) {

            $collectiveSongRatings = [];

            $artistSongIds = SongArtist::where('artist_id', $artist->id)->pluck('song_id')->toArray();
            $artistSongs = Song::whereIn('id', $artistSongIds)->get();

            foreach ($artistSongs as $artistSong) {
                if(isset($artistSong->rating)){
                    array_push($collectiveSongRatings, $artistSong->rating);
                }
            }

            $artist->rating = array_sum($collectiveSongRatings) / count($collectiveSongRatings);
            $artist->save();
        }

        session()->flash('message', 'You have rating the Song ' . $song->name . ' with ' . $this->rating . ' stars.');
    }

    /**
     * Set artist Id for songs modal
     * @param $id
     */
    public function setArtistSongs($id)
    {
        $artist = Artist::find($id);
        $songIds = SongArtist::where('artist_id', $id)->pluck('song_id')->toArray();
        $this->artistSongs = Song::whereIn('id', $songIds)->get();
        $this->artistName = $artist->name;
    }

}
