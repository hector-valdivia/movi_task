@extends('app')

@section('content')
    <h1>Create Movie</h1>

    @include('error_fragment')

    <form method="POST" action="{{ route('movie.store') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" />
        </div>

        <div class="form-group">
            <label>Year</label>
            <input type="number" name="year" class="form-control" >
        </div>

        <div class="form-group">
            <label>Genre</label>
            <select name="genre_id" class="form-control">
                <option value="">Select one</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Actors</label>
            <select name="actors[]" class="form-control" multiple>
                @foreach($actors as $actor)
                    <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
