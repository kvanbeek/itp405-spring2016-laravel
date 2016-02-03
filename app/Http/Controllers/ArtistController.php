<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function create()
    {
//        $artists = DB::table('artists')
//            ->orderBy('artist_name')
//            ->get();

        $artists = Artist::all();
        return view('artist.create', [
            'artists' => $artists
        ]);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'artist' => 'required|unique:artists,artist_name'
        ]);

        if ($validation->fails()) {
            return redirect('artists/new')
                ->withInput()
                ->withErrors($validation);
        }

//        DB::table('artists')->insert([
//            'artist_name' => $request->input('artist')
//        ]);
        $artist = new Artist([
            'artist_name' => $request->input('artist')
        ]);
        $artist->save();

        return redirect('artists/new')->with('success', true);
    }

}
