
@extends('admin.master')

@section('title', 'contacts | ' . env('APP_NAME'))

@section('content')

    <h1>All contacts</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach ($contacts as $contact)
                <td>{{ $contact->id}}</td>
                <td>{{ $contact->name}}</td>
                <td>{{ $contact->email}}</td>
                <td>{{ $contact->subject}}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->location }}</td>
                <td>{{ $contact->phone }}</td>
                <td>
                        <a class="btn btn-primary" href="{{ route('admin.contacts.edit', $contact->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

