@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Edit Post
                <a href="{{ url('admin/post') }}" class="btn btn-sm btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <!-- PostFormRequest error-handling display -->
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- For Category -->
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="" disabled selected>-- Select Category --</option>
                        @foreach ($category as $cat_item)
                        <option value="{{ $cat_item->id }}" {{ $post->category_id == $cat_item->id ? 'selected':'' }}>
                            {{ $cat_item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="mySummernote" rows="4" class="form-control">{!! $post->description !!}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">YouTube Iframe Link</label>
                    <input type="text" name="yt_iframe" value="{{ $post->yt_iframe }}" class="form-control">
                </div>

                <h4>SEO Tags</h4>

                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{!! $post->meta_description !!}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea name="meta_keyword" rows="3" class="form-control">{!! $post->meta_keyword !!}</textarea>
                </div>

                <h4>Status</h4>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked':'' }}>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary float-end" value="Update Post">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection