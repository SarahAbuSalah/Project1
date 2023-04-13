
@extends('admin.master')

@section('title', 'clients | ' . env('APP_NAME'))

@section('content')

    <h1>All Blogs</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Logo</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($clients as $client)
                <td>{{ $client->id}}</td>
                <td>{{ $client->logo}}</td>
                <td>
                        <a class="btn btn-primary" href="{{ route('admin.clients.edit', $client->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.clients.destroy', $client->id) }}" method="POST">
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

