@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Add New Category | ' . env('APP_NAME'))

@section('content')

    <h1>Add new Category</h1>
    @include('admin.errors')

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="name" class="form-control">
        </div>

        <button class="btn btn-success px-5">Add</button>

    </form>

@stop
