@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Website Setting</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/setting') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Website Name</label>
                            <input type="text" name="website_name" @if ($setting) value="{{ $setting->website_name }}" @endif class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Website Logo</label>
                            <input type="file" name="website_logo" class="form-control">
                            @if ($setting)
                                <img src="{{ asset('uploads/website-logo/'.$setting->logo) }}" width="70px" height="70px" alt="Logo">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="">Website Favicon</label>
                            <input type="file" name="website_favicon" class="form-control">
                            @if ($setting)
                                <img src="{{ asset('uploads/website-favicon/'.$setting->favicon) }}" width="70px" height="70px" alt="Favicon">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="" rows="3" class="form-control">@if ($setting) {{ $setting->description }} @endif</textarea>
                        </div>

                        <h4>SEO - Meta Tags</h4>

                        <div class="mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" @if ($setting) value="{{ $setting->meta_title }}" @endif class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" id="" rows="3" class="form-control">@if ($setting) {{ $setting->meta_keyword }} @endif</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" id="" rows="3" class="form-control">@if ($setting) {{ $setting->meta_title }} @endif</textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection