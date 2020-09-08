@extends('app')

@section('content')
    <h1>List of Genres</h1>
    @if(auth()->check())
        <div class="text-right">
            <a href="{{ route('genre.create') }}" class="btn btn-success">Create Genre</a>
        </div>
    @endif

    @include('notice_frament')

    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Genre</th>
                @if(auth()->check())
                    <th>Accion</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @if( count($genres) )
            @foreach($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    @if(auth()->check())
                        <td>
                            <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-link btn-xs">Edit</a>
                            <a href="{{ route('genre.destroy', $genre->id) }}" class="btn btn-link btn-xs">Delete</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2" class="text-center">No genres found</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection
