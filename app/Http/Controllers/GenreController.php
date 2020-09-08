<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Requests\GenreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('genre.genre_index', [
            'genres' => Genre::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('genre.genre_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(GenreRequest $request)
    {
        $genre = Genre::create($request->validated());

        session()->flash('success', 'Genre '. $genre->name .' was created');

        return redirect()->route('genre.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return Response
     */
    public function edit(Genre $genre)
    {
        return view('genre.genre_edit', [ 'genre' => $genre ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return Response
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->fill($request->validated());
        $genre->save();

        session()->flash('success', 'Genre '. $genre->name .' was updated');

        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        session()->flash('success', 'Genre '. $genre->name .' was deleted');

        return redirect()->route('genre.index');
    }
}
