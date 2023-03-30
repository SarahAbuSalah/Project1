
@extends('admin.master')

@section('title', 'teams | ' . env('APP_NAME'))

@section('content')

    <h1>All Offers</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Job</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach ($teams as $team)
                <td>{{ $team->id}}</td>
                <td><img width="80" src="{{ asset('uploads/teams/'.$team->image) }}" alt=""></td>
                <td>{{ $team->name}}</td>
                <td>{{ $team->job}}</td>
                <td>{{ $team->content}}</td>
                <td>
                        <a class="btn btn-primary" href="{{ route('admin.team.edit', $teams->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.team.destroy', $teams->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

