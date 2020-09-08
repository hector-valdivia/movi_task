@extends('app')

@section('content')
    <h1>Show Movie ID {{ $movie->id }}</h1>

    <table class="table">
        <tr>
            <td>Name</td>
            <td>{{ $movie->name }}</td>
        </tr>
        <tr>
            <td>Year</td>
            <td>{{ $movie->year }}</td>
        </tr>
        <tr>
            <td>Genre</td>
            <td>{{ $movie->genre->name }}</td>
        </tr>
        <tr>
            <td>Actors</td>
            <td>
                <ul>
                    @foreach($movie->actors as $actor)
                        <li>{{ $actor->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
@endsection
