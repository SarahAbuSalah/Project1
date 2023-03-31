@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Add New Team | ' . env('APP_NAME'))

@section('content')

    <h1>Add new Team</h1>
    @include('admin.errors')

    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Job</label>
            <input type="text" name="job" placeholder="job" class="form-control">
        </div>

        <div class="mb-3">
            <label>Content</label>
            <input type="text" name="content" placeholder="content" class="form-control">
        </div>

        <button class="btn btn-success px-5">Add</button>

    </form>

@stop
