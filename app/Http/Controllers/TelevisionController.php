<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelevisionController extends Controller
{
    public function index($page = 1)
    {

        $popular_television = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMDMwNmQyZTYyYTliNzI3OTMyYTAwNmIwOWFjZmM3YiIsInN1YiI6IjYzM2FlZmY1Y2Y0OGExMDA3ZGJjMDU1ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.i96htIIRGlIFisb-H2sH2hkrQ7LAHpYqq9-W7SPlUpo')
        ->get('https://api.themoviedb.org/3/tv/popular/?page='.$page)->json()['results'];
        // dump($popular_television);
        return view('television.index',[
            'popular_television' => $popular_television
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
        $television_detail = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMDMwNmQyZTYyYTliNzI3OTMyYTAwNmIwOWFjZmM3YiIsInN1YiI6IjYzM2FlZmY1Y2Y0OGExMDA3ZGJjMDU1ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.i96htIIRGlIFisb-H2sH2hkrQ7LAHpYqq9-W7SPlUpo')
        ->get('https://api.themoviedb.org/3/tv/' .$id.'?append_to_response=credits,images,videos')->json();

        // dump($television_detail);

        return view('television.show',[
            'television_detail' => $television_detail
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
