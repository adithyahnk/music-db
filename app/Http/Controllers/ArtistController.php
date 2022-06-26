<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use App\Models\SongArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artists.all-artists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create-artist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artist = new Artist();
        $artist->name = $request->get('name');
        $artist->dob = $request->get('dob');
        $artist->bio = $request->get('bio');
        $artist->save();
        return redirect('artists');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);
        $songIds = SongArtist::where('artist_id', $id)->pluck('song_id')->toArray();
        $artistSongs = Song::whereIn('id', $songIds)->get();
        return view('artists.view-artist', compact('artist', 'artistSongs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::find($id);
        return view('artists.edit-artist', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artist = Artist::find($id);
        $artist->name = $request->get('name');
        $artist->dob = $request->get('dob');
        $artist->bio = $request->get('bio');
        $artist->save();
        return redirect('artists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addDynamicArtist(Request $request)
    {
       $artist = Artist::create([
            'name' => $request->get('name'),
            'dob' => $request->get('dob'),
            'bio' => $request->get('bio'),
        ]);
        return $artist;
    }

}
