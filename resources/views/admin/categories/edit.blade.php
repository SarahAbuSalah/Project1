@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Edit Category | ' . env('APP_NAME'))

@section('content')

    <h1>Edit Category</h1>
    @include('admin.errors')

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="name" class="form-control" value="{{ $category->name }}">
        </div>


        <button class="btn btn-success px-5">Update</button>

    </form>

@stop
