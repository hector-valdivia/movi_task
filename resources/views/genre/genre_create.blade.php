@extends('app')

@section('content')

    <h1>Create Genre</h1>

    @include('error_fragment')

    <form method="POST" action="{{ route('genre.store') }}">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
        </div>

        <button class="btn btn-success">Save</button>
    </form>

@endsection
