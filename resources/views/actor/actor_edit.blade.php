@extends('app')

@section('content')
    <form method="POST" action="{{ route('actor.update', $actor->id) }}">
        @csrf
        @method('PUT')
        @include('error_fragment')

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $actor->name }}" />
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
