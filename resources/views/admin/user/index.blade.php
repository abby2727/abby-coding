@extends('layouts/master')

@section('title', 'User')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                View Users
                <!-- <a href="{{ url('admin/add-post') }}" class="btn btn-sm btn-primary float-end">Add Post</a> -->
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if (session('message_delete'))
            <div class="alert alert-danger">{{ session('message_delete') }}</div>
            @endif

            <div class="table-responsive">
                <table id="myDataTable" class="table table-bordered table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role_as == '1' ? 'Admin' : 'User' }}</td>
                            <td>
                                <a href="{{ url('admin/edit-user/'.$item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection