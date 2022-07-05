@extends('layouts/app')

@section('title', $category->meta_title)

@section('meta_keyword', $category->meta_keyword)

@section('meta_description', $category->meta_description)

@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-heading">
                    <h4>{{ $category->name }}</h4>
                </div>

                @forelse ($post as $post_item)
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <a class="text-decoration-none" href="{{ url('tutorial/'.$category->slug.'/'.$post_item->slug) }}">
                                <h2 class="post-heading">{{ $post_item->name }}</h2>
                            </a>
                        </div>
                        <h6>
                            Posted On: {{ $post_item->created_at->format('d-m-Y') }}
                            <span class="ms-3">Posted By: {{ $post_item->user->name }}</span>
                        </h6>
                    </div>
                @empty
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <h2 class="text-danger">No post available</h2>
                        </div>
                    </div>
                @endforelse

                <div class="your-paginate mt-4">
                    {{ $post->links() }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="border p-2">
                    <h4>Advertising Area</h4>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection