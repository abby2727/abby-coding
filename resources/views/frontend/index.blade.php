@extends('layouts.app')

@section('title', $setting->meta_title)

@section('meta_keyword', $setting->meta_keyword)

@section('meta_description', $setting->meta_description)

@section('content')

    <div class="bg-danger py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel category-carousel owl-theme">

                        <!-- Display Category image in a carousel mode -->
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

    <div class="py-5">
        <div class="container">
            <div class="border text-center p-3">
                <h3>Advertisement</h3>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Funda Web of IT</h4>
                    <div class="underline"></div> <!-- unerline style -->
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur ipsa incidunt perferendis ut,
                        labore cum laboriosam perspiciatis laudantium tempore aut sapiente adipisci dicta reiciendis
                        excepturi fugit debitis nulla dolore harum?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit nam molestias placeat iste repellat
                        temporibus beatae ab veritatis. Totam consectetur harum mollitia asperiores veritatis distinctio
                        pariatur dignissimos illo illum facere?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Categories List</h4>
                    <div class="underline"></div> <!-- unerline style -->
                </div>

                @foreach ($all_categories as $all_cat_item)
                    <div class="col-md-3">
                        <div class="card card-body mb-3">
                            <a href="{{ url('tutorial/' . $all_cat_item->slug) }}" class="text-decoration-none">
                                <h4 class="text-dark mb-0">{{ $all_cat_item->name }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <!-- <h1>test</h1> -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest Posts</h4>
                    <div class="underline"></div> <!-- unerline style -->
                </div>
                <div class="col-md-8">
                    @foreach ($latest_posts as $latest_post_item)
                        <div class="card card-body bg-gray shadow mb-3">
                            <a href="{{ url('tutorial/' . $latest_post_item->category->slug . '/' . $latest_post_item->slug) }}"
                                class="text-decoration-none">
                                <h4 class="text-dark mb-0">{{ $latest_post_item->name }}</h4>
                            </a>
                            <h6>Posted On: {{ $latest_post_item->created_at->format('d-m-Y') }}</h6>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <div class="border text-center p-3">
                            <h3>Advertisement</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
