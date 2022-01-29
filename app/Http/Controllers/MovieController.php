<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Role;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Movie::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = Movie::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'rating' => $request->rating,
            'description' => $request->description,
            'release_year' => $request->release_year
        ]);
        foreach ($request->roles as $role) {
            Role::create([
                'role_name' => $role['role_name'],
                'main_role' => $role['main_role'],
                'movie_id' => $movie->id,
                'actor_id' => $role['actor_id']
            ]);
        }
        return response()->json($this->transform(Movie::find($movie->id)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return response()->json($this->transform($movie));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->all());
        return response()->json($this->transform($movie));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json(null, 204);
    }
    private function transform($m)
    {
        return [
            "id" => $m->id,
            "created_at" => $m->created_at,
            "updated_at" => $m->updated_at,
            "title" => $m->title,
            "duration" => $m->duration,
            "rating" => $m->rating,
            "description" => $m->description,
            "release_year" => $m->release_year,
            "roles" => $m->roles,
        ];
    }
}
