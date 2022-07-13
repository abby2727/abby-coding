@extends('layouts.master')

@section('title', 'Change Password')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- Display errors, success, and validation messages --}}
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <div class="card mt-4">
                    <div class="card-header"> Change Password </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('change.password') }}">
                            {{ csrf_field() }}

                            <!-- Current Password -->
                            <div class="row mb-3">
                                <label for="new_password" class="col-md-4 col-form-label text-md-end">
                                    Current Password
                                </label>
                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control"
                                        name="current_password" required>
                                </div>
                            </div>

                            <!-- New Password -->
                            <div class="row mb-3">
                                <label for="new_password" class="col-md-4 col-form-label text-md-end">New Password</label>
                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        required>
                                </div>
                            </div>

                            <!-- Confirm New Password -->
                            <div class="row mb-3">
                                <label for="new_password_confirm" class="col-md-4 col-form-label text-md-end">
                                    Confirm New Password
                                </label>
                                <div class="col-md-6">
                                    <input id="new_password_confirm" type="password" class="form-control"
                                        name="new_password_confirmation" required>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
