@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Add New contact | ' . env('APP_NAME'))

@section('content')

    <h1>Add new contact</h1>
    @include('admin.errors')

    <form action="{{ route('admin.contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name"  class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" placeholder="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <input type="text" name="subject" placeholder="subject" class="form-control">
        </div>

        <div class="mb-3">
            <label>Message</label>
            <input type="text" name="message" placeholder="message" class="form-control">
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" placeholder="location" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="phone" name="phone" placeholder="phone" class="form-control">
        </div>


        <button class="btn btn-success px-5">Add</button>

    </form>

@stop
