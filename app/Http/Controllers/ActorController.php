<?php

namespace App\Http\Controllers;
use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        return Actor::all();
    }
 
    public function show(Actor $actor)
    {
        return $actor;
    }

    public function store(Request $request)
    {        
    	$rules = [
            'name' => 'string|required',
            'born_date' => 'date',
            'nationality' => 'string'
        ];

        $this->validate($request, $rules);
     
        $fields = $request->all();
       
        $actor = Actor::create($fields);
        
        return response()->json($actor, 201);
    }

    public function update(Request $request,  Actor $actor)
    {
        $actor->update($request->all());
        return response()->json($actor, 200);
    }

    public function delete(Actor $actor)
    {	
        $actor->delete();
        return response()->json($actor, 200);
    }
}
