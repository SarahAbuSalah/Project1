@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Add New Blog | ' . env('APP_NAME'))

@section('content')

    <h1>Add new Blog</h1>
    @include('admin.errors')

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" placeholder="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Content</label>
            <input type="text" name="content" placeholder="content" class="form-control">
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="text" name="date" placeholder="date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Writer</label>
            <input type="text" name="writer" placeholder="writer" class="form-control">
        </div>

        <div class="mb-3">
            <label>Viwer</label>
            <input type="text" name="viwer" placeholder="viwer" class="form-control">
        </div>

        <div class="mb-3">
            <label>Category Id</label>
            <input type="text" name="category_id" placeholder="category_id" class="form-control">
        </div>

        <button class="btn btn-success px-5">Add</button>

    </form>

@stop
