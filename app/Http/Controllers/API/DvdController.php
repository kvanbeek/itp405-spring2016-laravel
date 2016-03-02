<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Dvd;
use App\Models\Genre;
use App\Models\Rating;
use App\Models\Label;
use App\Models\Sound;
use App\Models\Format;
use Response;
use Validator;

class DvdController extends Controller
{
    public function genres()
    {
        $genres = Genre::all();
        return [
            'genres' => $genres
        ];
    }

    public function genreId($id)
    {


        $genre = Genre::find($id);


        if (!$genre) {
            return Response::json([
                'error' => 'Genre not found'
            ], 404);
        }

        return [
            'genre' => $genre
        ];

    }

    public function results()
    {
//        $dvds = Dvd::take(20)->get();
        $dvds = Dvd::with('genre', 'rating')
            ->take(20)
            ->get();



        return [
            'dvds' => $dvds
        ];
    }

    public function dvdId($id)
    {

        $dvd = Dvd::with('genre', 'rating')
            ->get()
            ->find($id);


        if (!$dvd) {
            return Response::json([
                'error' => 'Dvd not found'
            ], 404);
        }

        return [
            'dvd' => $dvd
        ];


    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|unique:dvds,title'
        ]);

        if ($validation->passes()) {
            $dvd = new Dvd();
            $dvd->title = $request->input('title');
            $dvd->save();

            return [
                'dvd' => $dvd
            ];
        }

        return Response::json([
            'errors' => [
                'title' => $validation->errors()->get('title')
            ]
        ], 422);
    }





}