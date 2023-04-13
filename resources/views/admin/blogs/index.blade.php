
@extends('admin.master')

@section('title', 'blogs | ' . env('APP_NAME'))

@section('content')

    <h1>All Blogs</h1>
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
                <th>Date</th>
                <th>Writer</th>
                <th>Viwer</th>
                <th>category_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($blogs as $blog)
                <td>{{ $blog->id}}</td>
                <td><img width="80" src="{{ asset('uploads/blogs/'.$blog->image) }}" alt=""></td>
                <td>{{ $blog->title}}</td>
                <td>{{ $blog->content}}</td>
                <td>{{ $blog->date}}</td>
                <td>{{ $blog->writer}}</td>
                <td>{{ $blog->viwer}}</td>
                <td>{{ $blog->category_id}}</td>
                <td>
                        <a class="btn btn-primary" href="{{ route('admin.blogs.edit', $blog->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST">
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

