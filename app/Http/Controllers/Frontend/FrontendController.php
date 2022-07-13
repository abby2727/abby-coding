<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;

class FrontendController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        $all_categories = Category::where('status', '1')->get();
        $latest_posts = Post::where('status', '1')->orderBy('created_at', 'DESC')->get()->take(10);

        return view('frontend.index', compact('all_categories', 'latest_posts', 'setting'));
    }

    public function viewCategoryPost($category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '1')->first();

        if ($category) {
            $post = Post::where('category_id', $category->id)->where('status', '1')->paginate(10);
            return view('frontend.post.index', compact('post', 'category'));
        } else {
            return redirect('/');
        }
    }

    public function viewPost(string $category_slug, string $post_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '1')->first();

        if ($category) {
            $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '1')->first();
            $latest_post = Post::where('category_id', $category->id)->where('status', '1')->orderBy('created_at', 'DESC')->get()->take(15);

            return view('frontend.post.view', compact('post', 'latest_post'));
        } else {
            return redirect('/');
        }
    }
}
