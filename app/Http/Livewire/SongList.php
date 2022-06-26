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

}
