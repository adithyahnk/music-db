<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use App\Models\Rating;
use App\Models\Song;
use App\Models\SongArtist;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SongList extends Component
{
    use WithPagination;

    public $searchString;

    public $songId, $songName;

    public $songArtists;

    public $rating, $user;

    public function render()
    {
        if (strlen($this->searchString) > 0) {
            $this->resetPage();
        }
        $songs = Song::where('name', 'like', '%' . $this->searchString . '%')->paginate(7);
        return view('livewire.song-list', compact('songs'));
    }

    /**
     * Set artist Id for deletion modal
     * @param $id
     */
    public function setSong($id)
    {
        $this->songId = $id;
        $song = Song::find($id);
        $this->songName = $song->name;
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
     * Reset Artist Details
     */
    public function resetSong()
    {
        $this->songId = '';
        $this->songName = '';
        $this->rating = '';
        $this->user = '';
    }

    /**
     * Delete song from DB
     */
    public function deleteSong()
    {
        Song::find($this->songId)->delete();
    }

    /**
     * Rating feature
     * Insert user if user is not present in DB
     * If user present, fetch user id, rating from the form and insert rating
     * average song rating = sum of total song rating / count of ratings for the song
     * set average artist rating
     * average artist rating = sum of average rating of artist songs / count of average rating of artist songs.
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

}
