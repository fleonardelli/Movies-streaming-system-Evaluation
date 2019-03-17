<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Events\MovieCreated;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::all();
    }
 
    public function show(Movie $movie)
    {
        $movie->actors = $movie->actors;
        return $movie;
    }

    public function store(Request $request)
    {        
    	$rules = [
            'name' => 'string|required',
            'path' => 'string|required',
            'actors' => 'array',
            'gender' => 'string',
            'release' => 'number',
            'length' => 'between:0,3'
        ];

        $this->validate($request, $rules);
     
        $fields = $request->except(['actors']);
       
        $movie = Movie::create($fields);

        if (isset($request->actors)) {
            $movie->actors()->attach($request->actors);
        }

        event(new MovieCreated($movie)); 

        return response()->json($movie, 201);
    }

    public function update(Request $request,  Movie $movie)
    {
        $movie->update($request->except(['actors']));

        if (isset($request->actors)) {
            $movie->actors()->attach($request->actors);
        }

        return response()->json($movie, 200);
    }

    public function delete(Movie $movie)
    {	
        $movie->delete();
        return response()->json($movie, 200);
    }
}
