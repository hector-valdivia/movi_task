@extends('app')

@section('content')
    <h1>Edit Movie ID {{ $movie->id }}</h1>
    @include('error_fragment')

    <form method="POST" action="{{ route('movie.update', $movie->id) }}">
        @csrf
        @method('PUT')

        <div class="fom-group">
            <label>Name</label>
            <input type="text"  name="name" value="{{ $movie->name }}" class="form-control" />
        </div>

        <div class="form-group">
            <label>Year</label>
            <input type="number" name="year" value="{{ $movie->year }}" class="form-control" />
        </div>

        <div class="form-group">
            <label>Genre</label>
            <select name="genre_id" class="form-control">
                <option value="">Select one</option>
                @foreach($genres as $genre)
                    @if($genre->id === $movie->genre_id)
                        <option value="{{ $genre->id }}" selected="true">{{ $genre->name }}</option>
                    @else
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Actors</label>
            <select name="actors[]" class="form-control" multiple>
                @foreach($actors as $actor)
                    @if(in_array($actor->id, $actor_selected))
                        <option value="{{ $actor->id }}" selected="true">{{ $actor->name }}</option>
                    @else
                        <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
