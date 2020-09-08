<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Http\Requests\ActorRequest;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('actor.actor_index', [
            'actors' => Actor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actor.actor_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActorRequest $request)
    {
        $actor = Actor::create($request->validated());

        session()->flash('success', 'Actor '.$actor->name.' was created');

        return redirect()->route('actor.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        return view('actor.actor_edit', [
            'actor' => $actor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(ActorRequest $request, Actor $actor)
    {
        $actor->fill($request->validated());
        $actor->save();

        session()->flash('success', 'Actor '.$actor->name.' was updated');

        return redirect()->route('actor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        session()->flash('success', 'Actor '.$actor->name.' was deleted');

        return redirect()->route('actor.index');
    }
}
