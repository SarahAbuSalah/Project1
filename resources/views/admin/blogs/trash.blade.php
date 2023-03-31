@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Trashed Blogs | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed Blogs</h1>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($blogs as $blog)
                    <td>{{ $blog->id }}</td>
                    <td><img width="80" src="{{ asset('uploads/blogs/'.$feature->image) }}" alt=""> </td>                    <td>{{ $feature->title }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->content }}</td>
                    <td>{{ $blog->date }}</td>
                    <td>{{ $blog->writer }}</td>
                    <td>{{ $blog->viwer }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.blogs.restore', $blog->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.blogs.forcedelete', $blog->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
