@extends('app')

@section('content')
    <h1>Create Movie</h1>

    @include('error_fragment')

    <form method="POST" action="{{ route('movie.store') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
        </div>

        <div class="form-group">
            <label>Year</label>
            <input type="number" name="year" class="form-control" value="{{ old('year') }}" >
        </div>

        <div class="form-group">
            <label>Genre</label>
            <select name="genre_id" class="form-control">
                <option value="">Select one</option>
                @foreach($genres as $genre)
                    @if(old('genre_id') == $genre->id)
                        <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
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
                    @if(is_array(old('actors')) && in_array($actor->id, old('actors')))
                        <option value="{{ $actor->id }}" selected>{{ $actor->name }}</option>
                    @else
                        <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
