@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Add New Client | ' . env('APP_NAME'))

@section('content')

    <h1>Add new Client</h1>
    @include('admin.errors')

    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Logo</label>
            <input type="text" name="logo" placeholder="logo" class="form-control">
        </div>

        <button class="btn btn-success px-5">Add</button>

    </form>

@stop
