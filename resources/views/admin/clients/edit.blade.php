@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Edit client | ' . env('APP_NAME'))

@section('content')

    <h1>Edit Client</h1>
    @include('admin.errors')

    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Logo</label>
            <input type="text" name="logo" placeholder="logo" class="form-control" value="{{ $client->logo }}">
        </div>


        <button class="btn btn-success px-5">Update</button>

    </form>

@stop
