@extends('app')

@section('content')
    <h1>List Movies</h1>
    @if( auth()->check())
        <div class="text-right">
            <a href="/movie/create" class="btn btn-info">Create Movie</a>
        </div>
    @endif

    @include('notice_frament')

    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Actors</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if( count($movies) )
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->name }}</td>
                        <td>{{ $movie->year }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>{{ count($movie->actors) }}</td>
                        <td>
                            <a class="btn btn-link btn-xs" href="{{ route('movie.show', $movie->id) }}">See</a>
                            @if(auth()->check())
                            <a class="btn btn-link btn-xs" href="{{ route('movie.edit', $movie->id) }}">Edit</a>
                            <a class="btn btn-link btn-xs" href="{{ route('movie.destroy', $movie->id) }}">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr><td colspan="5" class="text-center">Not movies found</td></tr>
            @endif
        </tbody>
    </table>
@endsection
