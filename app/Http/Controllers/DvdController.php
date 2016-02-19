<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\Models\Dvd;
use App\Models\Genre;
use App\Models\Rating;
use App\Models\Label;
use App\Models\Sound;
use App\Models\Format;



class DvdController extends Controller
{
    //
    public function create()
    {


        $genres = Genre::all();
        $ratings = Rating::all();
        $labels = Label::all();
        $sounds = Sound::all();
        $formats = Format::all();


        return view('dvd.createdvd', [
            'genres' => $genres,
            'ratings' => $ratings,
            'labels' => $labels,
            'sounds' => $sounds,
            'formats' => $formats
        ]);


    }

    public function store(Request $request)
    {
        $dvd = new Dvd;

        $dvd->title = $request->title;
        $dvd->genre_id = $request->genre;
        $dvd->rating_id = $request->rating;
        $dvd->label_id = $request->label;
        $dvd->sound_id = $request->sound;
        $dvd->format_id = $request->formatId;

        $dvd->save();

        return redirect("create")->with('success', true);

    }

    public function genres($id)
    {


        $genre = Genre::find($id);


        $dvds = Dvd::with('genre', 'rating', 'label')
            ->where('genre_id', $id)
            ->get();


        return view('dvd.genres', [
            'dvds' => $dvds,
            'genre' => $genre
        ]);


    }

    public function search()
    {


        $genres = Genre::all();

        $ratings = DB::table('ratings')
            ->select('id', 'rating_name')
            ->get();


        return view('dvd.search', [
            'genres' => $genres,
            'ratings' => $ratings
        ]);


    }

    public function info($id)
    {

        $query = DB::table('dvds')
            ->select('dvds.id', 'title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
            ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
            ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
            ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id');

        $dvd = $query->where('dvds.id', $id)->first();


        $reviews_query = DB::table('reviews')
            ->select('rating', 'title', 'description')
            ->where('dvd_id', $id);

        $reviews = $reviews_query->get();


        return view('dvd.info', [
            'dvd' => $dvd,
            'reviews' => $reviews
        ]);
    }

    public function review(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'rating' => 'numeric|max:10|min:0',
            'title' => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'dvd_id' => 'required|integer'
        ]);


        $id = $request->input('dvd_id');


        if ($validation->fails()) {
            return redirect("dvds/$id")
                ->withInput()
                ->withErrors($validation);
        }

        DB::table('reviews')->insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'dvd_id' => $request->input('dvd_id'),
            'rating' => $request->input('rating')
        ]);

        return redirect("dvds/$id")->with('success', true);


//        rating, numeric value from 1-10
//        title, required with at least 5 characters
//        description, required with at least 10 characters
//        dvd_id, required integer

    }

    public function results(Request $request)
    {
        $searchTerm = $request->input('dvd');
        $genre = $request->input('genre');
        $rating = $request->input('rating');
        $rating_name = "";
        $genre_name = "";


        $query = DB::table('dvds')
            ->select('dvds.id', 'title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
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
