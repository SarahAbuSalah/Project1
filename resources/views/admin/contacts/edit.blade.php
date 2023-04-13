@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Edit contact | ' . env('APP_NAME'))

@section('content')

    <h1>Edit contact</h1>
    @include('admin.errors')

    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name"  class="form-control " value="{{ $contact->name }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" placeholder="email" class="form-control" value="{{ $contact->email }}">
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <input type="text" name="subject" placeholder="subject" class="form-control" value="{{ $contact->subject }}">
        </div>

        <div class="mb-3">
            <label>Message</label>
            <input type="text" name="message" placeholder="message" class="form-control" value="{{ $contact->message }}">
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" placeholder="location" class="form-control" value="{{ $contact->location }}">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="phone" name="phone" placeholder="phone" class="form-control" value="{{ $contact->phone }}">
        </div>





        <button class="btn btn-success px-5">Update</button>

    </form>

@stop
