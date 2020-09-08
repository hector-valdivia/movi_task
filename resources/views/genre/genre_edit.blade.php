@extends('app')

@section('content')

    <h1>Edit Genre ID {{ $genre->id }}</h1>

    @include('error_fragment')

    <form method="POST" action="{{ route('genre.update', $genre->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') ?? $genre->name }}" class="form-control" />
        </div>

        <button class="btn btn-success">Save</button>
    </form>

@endsection
