<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [ 'name', 'year', 'genre_id' ];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function actors(){
        return $this->belongsToMany(Actor::class, 'movie_actors', 'movie_id', 'actor_id', 'id', 'id');
    }
}
