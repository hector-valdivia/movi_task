<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Genre;
use App\Http\Requests\MovieRequest;
use App\Movie;
use Illuminate\Http\Request;

/**
 * Class MovieController
 * @package App\Http\Controllers
 */
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $movies = Movie::with('genre')->withCount('actors')->get();

        return view('movie', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('movie/movie_create', [
            'genres' => Genre::all(),
            'actors' => Actor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MovieRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MovieRequest $request)
    {
        $movie = Movie::create($request->validated());
        $movie->actors()->sync($request->actors);

        session()->flash('success', 'Movie '. $movie->name .' was created');

        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\View\View
     */
    public function show(Movie $movie)
    {
        $movie->load('genre', 'actors');

        return view('movie.movie_show', [
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\View\View
     */
    public function edit(Movie $movie)
    {
        $movie->load('actors');
        $actor_selected = $movie->actors->pluck('id')->toArray();

        return view('movie.movie_edit', [
            'movie' => $movie,
            'actor_selected' => $actor_selected,
            'genres' => Genre::all(),
            'actors' => Actor::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MovieRequest  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $movie->fill($request->except('actors'));
        $movie->save();
        $movie->actors()->sync($request->actors);

        session()->flash('success', 'Movie '.$movie->name. ' was updated');

        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        session()->flash('success', 'Movie '.$movie->name. ' was deleted');

        return redirect()->route('movie.index');
    }
}
