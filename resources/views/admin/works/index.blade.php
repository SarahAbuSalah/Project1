
@extends('admin.master')

@section('title', 'works | ' . env('APP_NAME'))

@section('content')

    <h1>All Works</h1>
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
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($works as $work)
                <td>{{ $work->id}}</td>
                <td><img width="80" src="{{ asset('uploads/works/'.$work->image) }}" alt=""></td>
                <td>{{ $work->title}}</td>
                <td>{{ $work->content}}</td>
                <td>
                        <a class="btn btn-primary" href="{{ route('admin.works.edit', $work->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.works.destroy', $work->id) }}" method="POST">
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

