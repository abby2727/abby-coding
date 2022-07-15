@extends('layouts.app')

@section('title', $setting->meta_title)

@section('meta_keyword', $setting->meta_keyword)

@section('meta_description', $setting->meta_description)

@section('content')

    {{-- Website Intro --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>AbbyCoding</strong></h4>
                    <div class="underline"></div> {{-- Underline --}}
                    <p class="fs-5">
                        AbbyCoding is a Blogging Web Application built over a Relational Database Management System. It was
                        created to produce quality content related to programming languages. My goal is to make sure
                        everyone that has an interest in technologies, especially in the IT field will get fundamental
                        knowledge and information about programming.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Latest Posts --}}
    <div class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>Latest Posts</strong></h4>
                    <div class="underline"></div> {{-- Underline --}}
                </div>
                <div class="col-md-8">
                    @foreach ($latest_posts as $latest_post_item)
                        <div class="card card-body bg-gray shadow mb-3">
                            <a href="{{ url('tutorial/' . $latest_post_item->category->slug . '/' . $latest_post_item->slug) }}"
                                class="text-decoration-none">
                                <h4 class="text-dark mb-0">{{ $latest_post_item->name }}</h4>
                            </a>
                            <p>Posted On: {{ $latest_post_item->created_at->format('d-m-Y') }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <div class="border text-center p-3">
                            <h5>Advertisement Area</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel -->
    <div class="bg-danger py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel category-carousel owl-theme">
                        @foreach ($all_categories as $all_cat_item)
                            <div class="item">
                                <a href="{{ url('tutorial/' . $all_cat_item->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset('uploads/category/' . $all_cat_item->image) }}" alt="Image">
                                        <div class="card-body text-center">
                                            <h5 class="text-dark">{{ $all_cat_item->name }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
