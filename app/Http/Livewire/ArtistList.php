<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use App\Models\Song;
use App\Models\SongArtist;
use Livewire\Component;
use Livewire\WithPagination;

class ArtistList extends Component
{
    use WithPagination;

    public $searchString;

    public $artistId, $artistName;

    public $artistSongs;

    public function render()
    {
        if (strlen($this->searchString) > 0) {
            $this->resetPage();
        }
        $artists = Artist::where('name', 'like', '%' . $this->searchString . '%')->paginate(7);
        return view('livewire.artist-list', compact('artists'));
    }

    /**
     * Set artist Id for deletion modal
     * @param $id
     */
    public function setArtist($id)
    {
        $this->artistId = $id;
        $artist = Artist::find($id);
        $this->artistName = $artist->name;
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

    /**
     * Reset Artist Details
     */
    public function resetArtist()
    {
        $this->artistId = '';
        $this->artistName = '';
    }

    /**
     * Delete artist from DB
     */
    public function deleteArtist()
    {
        Artist::find($this->artistId)->delete();
    }
}
