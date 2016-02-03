<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\Models\Dvd;

class DvdController extends Controller
{
    //
    public function search()
    {
//        $artists = DB::table('artists')
//            ->orderBy('artist_name')
//            ->get();

        $genres = DB::table('genres')
            ->select('id', 'genre_name')
            ->get();

        $ratings = DB::table('ratings')
            ->select('id', 'rating_name')
            ->get();


        return view('dvd.create', [
            'genres' => $genres,
            'ratings' => $ratings
        ]);

//        $dvds = Dvd::all();
//        return view('dvd.create', [
//            'dvds' => $dvds
//        ]);
    }

    public function results(Request $request)
    {
        $searchTerm = $request->input('dvd');
        $genre = $request->input('genre');
        $rating = $request->input('rating');
        $rating_name = "";
        $genre_name = "";


        $query = DB::table('dvds')
            ->select('title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
            ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
            ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
            ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id');

        if($searchTerm){
            $query = $query->where('title', 'like', "%$searchTerm%");
        }

        if ($genre) {
            $query = $query->where('dvds.genre_id', $genre);
            $genre_name = DB::table('genres')->where('id', $genre)->value('genre_name');
        }

        if ($rating){
            $query = $query->where('dvds.rating_id', $rating);
            $rating_name = DB::table('ratings')->where('id', $rating)->value('rating_name');
        }

        $dvds = $query->get();



        return view('dvd.results', [
            'dvds' => $dvds,
            'searchTerm' => $searchTerm,
            'genre' => $genre_name,
            'rating' => $rating_name
        ]);

    }
}
