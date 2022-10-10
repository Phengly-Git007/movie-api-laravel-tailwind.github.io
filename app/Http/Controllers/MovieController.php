<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{

    public function index()
    {

        $popular_movie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMDMwNmQyZTYyYTliNzI3OTMyYTAwNmIwOWFjZmM3YiIsInN1YiI6IjYzM2FlZmY1Y2Y0OGExMDA3ZGJjMDU1ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.i96htIIRGlIFisb-H2sH2hkrQ7LAHpYqq9-W7SPlUpo')
        ->get('https://api.themoviedb.org/3/movie/popular')->json()['results'];

        $upcoming_movie = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMDMwNmQyZTYyYTliNzI3OTMyYTAwNmIwOWFjZmM3YiIsInN1YiI6IjYzM2FlZmY1Y2Y0OGExMDA3ZGJjMDU1ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.i96htIIRGlIFisb-H2sH2hkrQ7LAHpYqq9-W7SPlUpo')
        ->get('https://api.themoviedb.org/3/movie/upcoming')->json()['results'];

    //    dump($upcoming_movie);

       return view('movie.index',[
        'popular_movie' => $popular_movie,
        'upcoming_movie' => $upcoming_movie
       ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $movie_detail = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMDMwNmQyZTYyYTliNzI3OTMyYTAwNmIwOWFjZmM3YiIsInN1YiI6IjYzM2FlZmY1Y2Y0OGExMDA3ZGJjMDU1ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.i96htIIRGlIFisb-H2sH2hkrQ7LAHpYqq9-W7SPlUpo')
        ->get('https://api.themoviedb.org/3/movie/' .$id.'?append_to_response=credits,images,videos')->json();

        $movie_recommendations = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMDMwNmQyZTYyYTliNzI3OTMyYTAwNmIwOWFjZmM3YiIsInN1YiI6IjYzM2FlZmY1Y2Y0OGExMDA3ZGJjMDU1ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.i96htIIRGlIFisb-H2sH2hkrQ7LAHpYqq9-W7SPlUpo')
        ->get('https://api.themoviedb.org/3/movie/' .$id.'/recommendations')->json()['results'];


        // dump($movie_detail);
        return view('movie.show',[
            'movie_detail' => $movie_detail,
            'movie_recommendations' => $movie_recommendations
        ]);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
