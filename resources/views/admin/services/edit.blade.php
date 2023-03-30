@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Edit service | ' . env('APP_NAME'))

@section('content')

    <h1>Edit Offer</h1>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Icon</label>
            <input type="text" name="icon" placeholder="icon" class="form-control" value="{{ $service->icon }}">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" placeholder="title" class="form-control" value="{{ $service->title }}">
        </div>

        <div class="mb-3">
            <label>Content</label>
            <input type="text" name="content" placeholder="content" class="form-control" value="{{ $service->content }}">
        </div>


        <button class="btn btn-success px-5">Update</button>

    </form>

@stop
