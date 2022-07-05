@extends('layouts/master')

@section('title', 'Change Password')

@section('content')

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Change password</h2>

                <div class="panel-body">
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

                    @if($errors)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('change.password') }}">
                        {{ csrf_field() }}

                        <!-- Current Password -->
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="new_password" class="col-md-4 control-label">Current Password</label>
                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control" name="current_password" required>
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="new_password" class="col-md-4 control-label">New Password</label>
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" required>
                            </div>
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-group">
                            <label for="new_password_confirm" class="col-md-4 control-label">Confirm New Password</label>
                            <div class="col-md-6">
                                <input id="new_password_confirm" type="password" class="form-control" name="new_password_confirmation" required>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group mt-2">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
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