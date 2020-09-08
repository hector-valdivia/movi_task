@extends('app')

@section('content')
    <form method="POST" action="{{ route('actor.store') }}">
        @csrf
        @include('error_fragment')

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" />
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
