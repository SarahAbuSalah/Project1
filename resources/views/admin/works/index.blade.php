
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
                @foreach ($work as $works)
                <td>{{ $works->id}}</td>
                <td><img width="80" src="{{ asset('uploads/works/'.$works->image) }}" alt=""></td>
                <td>{{ $works->title}}</td>
                <td>{{ $works->content}}</td>
                <td>
                        <a class="btn btn-primary" href="{{ route('admin.works.edit', $works->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.works.destroy', $works->id) }}" method="POST">
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

