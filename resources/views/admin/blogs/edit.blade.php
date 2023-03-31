@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Edit blog | ' . env('APP_NAME'))

@section('content')

    <h1>Edit Blog</h1>
    @include('admin.errors')

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"  class="form-control">
            <img width="80" src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" placeholder="title" class="form-control" value="{{ $blog->title }}">
        </div>

        <div class="mb-3">
            <label>Content</label>
            <input type="text" name="content" placeholder="content" class="form-control" value="{{ $blog->content }}">
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="text" name="date" placeholder="date" class="form-control" value="{{ $blog->date }}">
        </div>

        <div class="mb-3">
            <label>Writer</label>
            <input type="text" name="writer" placeholder="writer" class="form-control" value="{{ $blog->writer }}">
        </div>

        <div class="mb-3">
            <label>Viwer</label>
            <input type="text" name="viwer" placeholder="viwer" class="form-control" value="{{ $blog->viwer }}">
        </div>

        <button class="btn btn-success px-5">Update</button>

    </form>

@stop
