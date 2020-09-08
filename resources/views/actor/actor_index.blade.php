@extends('app')

@section('content')
    <h1>List Actors</h1>

    @if( auth()->check())
        <div class="text-right">
            <a href="{{ route('actor.create') }}" class="btn btn-info">Create Actor</a>
        </div>
    @endif

    @include('notice_frament')

    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th>Name</th>
            @if( auth()->check())
            <th>Actions</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @if( count($actors) )
            @foreach($actors as $actor)
                <tr>
                    <td>{{ $actor->name }}</td>
                    @if( auth()->check())
                    <td>
                        <a href="{{ route('actor.edit', $actor->id) }}" class="btn btn-link btn-xs">Edit</a>
                        <a href="{{ route('actor.destroy', $actor->id) }}" class="btn btn-link btn-xs">Delete</a>
                    </td>
                    @endif
                </tr>
            @endforeach
        @else
            <tr><td colspan="5" class="text-center">Not actors found</td></tr>
        @endif
        </tbody>
    </table>
@endsection
