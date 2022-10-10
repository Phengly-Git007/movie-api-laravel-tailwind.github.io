<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{

    public function index($page = 1)
    {
        $popular_actor = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMDMwNmQyZTYyYTliNzI3OTMyYTAwNmIwOWFjZmM3YiIsInN1YiI6IjYzM2FlZmY1Y2Y0OGExMDA3ZGJjMDU1ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.i96htIIRGlIFisb-H2sH2hkrQ7LAHpYqq9-W7SPlUpo')
        ->get('https://api.themoviedb.org/3/person/popular?page='.$page)
        ->json()['results'];
        // dump($popular_actor);
        return view('actor.index',[
            'popular_actor' => $popular_actor
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

        $actor_detail = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMDMwNmQyZTYyYTliNzI3OTMyYTAwNmIwOWFjZmM3YiIsInN1YiI6IjYzM2FlZmY1Y2Y0OGExMDA3ZGJjMDU1ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.i96htIIRGlIFisb-H2sH2hkrQ7LAHpYqq9-W7SPlUpo')
        ->get('https://api.themoviedb.org/3/person/' .$id.'?append_to_response=combined_credits')->json();

        // dump($actor_detail);
        return view('actor.show',[
            'actor_detail' => $actor_detail
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
