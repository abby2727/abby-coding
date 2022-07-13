@extends('layouts.master')

@section('title', 'Edit User')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>
                    Edit User
                    <a href="{{ url('admin/user') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <!-- USER display -->

                <!-- Name -->
                <div class="mb-3">
                    <label for="">Full Name</label>
                    <p class="form-control text-muted">{{ $user->name }}</p>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="">Email</label>
                    <p class="form-control text-muted">{{ $user->email }}</p>
                </div>

                <!-- Timestamp -->
                <div class="mb-3">
                    <label for="">Created At</label>
                    <p class="form-control text-muted">{{ $user->created_at->format('d/m/Y') }}</p>
                </div>

                <!-- Edit user form -->
                <form action="{{ url('admin/update-user/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="">Role</label>
                        <select name="role_as" class="form-control">
                            <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
