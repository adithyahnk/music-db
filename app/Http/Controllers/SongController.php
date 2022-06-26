<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use App\Models\SongArtist;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('songs.all-songs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all();
        return view('songs.create-song', compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $song = new Song();
        $song->name = $request->get('song_name');
        $song->release_date = $request->get('release_date');
        if ($request->hasFile('cover')) {
            $cover = $request->cover->store('', 'images');
            $song->cover = $cover;
        }
        $song->save();

        return redirect('songs');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::find($id);
        $artistIds = SongArtist::where('song_id', $id)->pluck('artist_id')->toArray();
        $songArtists = Artist::whereIn('id', $artistIds)->get();
        return view('songs.view-song', compact('song', 'songArtists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::find($id);
        $artists = Artist::all();
        $songArtists = SongArtist::where('song_id', $id)->pluck('artist_id')->toArray();
        return view('songs.edit-song', compact('song', 'artists', 'songArtists'));
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
        $song = Song::find($id);
        $song->name = $request->get('song_name');
        $song->release_date = $request->get('release_date');
        if ($request->hasFile('cover')) {
            $cover = $request->cover->store('images');
            $song->cover = $cover;
        }
        $song->save();

        return redirect('songs');
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
}
