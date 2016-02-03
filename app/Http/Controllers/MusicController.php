<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MusicController extends Controller
{
    public function search()
    {
        return view('search');
    }

    public function results(Request $request)
    {
        $artist = $request->input('artist');

        if (!$artist) {
            return redirect('/search');
        }

        $songs = DB::table('songs')
            ->select('title', 'price', 'play_count', 'artist_name')
            ->leftJoin('artists', 'songs.artist_id', '=', 'artists.id')
            ->where('artist_name', 'like', "%$artist%")
            ->get();

//        dd($songs);

        return view('results', [
            'mysongs' => $songs,
            'searchTerm' => $artist
        ]);
    }
}