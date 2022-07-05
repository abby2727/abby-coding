@extends('layouts/master')

@section('title', 'Edit Category')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Edit Category
                <a href="{{ url('admin/category') }}" class="btn btn-sm btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            {{-- ERROR in the CategoryFormRequest --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="mySummernote" rows="5" class="form-control">{{ $category->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{ asset('uploads/category/'.$category->image) }}" width="50px" height="50px" alt="Img">
                </div>

                <h6>SEO Tags</h6>

                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{ $category->meta_description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keyword" rows="3" class="form-control">{{ $category->meta_keyword }}</textarea>
                </div>

                <h6>Status Mode</h6>

                <div class="row">
                    <div class="col-md-3 mb3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1' ? 'checked':'' }}>
                    </div>

                    <div class="col-md-3 mb3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }}>
                    </div>

                    <div class="col-md-6">
                        <input type="submit" value="Update Category" class="btn btn-primary">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection