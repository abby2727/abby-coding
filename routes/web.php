<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('change-password', [ChangePasswordController::class, 'index']);
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');

// Frontend controller
Route::get('/', [FrontendController::class, 'index']);
Route::get('/tutorial/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('/tutorial/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);

// Comment controller
Route::post('/comment', [CommentController::class, 'store']);
Route::post('/delete-comment', [CommentController::class, 'destroy']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    // DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // CategoryController
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::get('/edit-categroy/{category_id}', [CategoryController::class, 'edit']);
    Route::put('/update-category/{category_id}', [CategoryController::class, 'update']);
    Route::post('/delete-category', [CategoryController::class, 'destroy']);
    
    // PostController
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/add-post', [PostController::class, 'create']);
    Route::post('/add-post', [PostController::class, 'store']);
    Route::get('/edit-post/{post_id}', [PostController::class, 'edit']);
    Route::put('/update-post/{post_id}', [PostController::class, 'update']);
    Route::post('/delete-post', [PostController::class, 'destroy']);
    
    // UserController
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/add-user', [UserController::class, 'create']);
    Route::get('/edit-user/{user_id}', [UserController::class, 'edit']);
    Route::put('/update-user/{user_id}', [UserController::class, 'update']);

    // SettingController
    Route::get('/setting', [SettingController::class, 'index']);
    Route::post('/setting', [SettingController::class, 'saveData']);
});
