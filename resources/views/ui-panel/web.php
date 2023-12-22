<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\StudentCountController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeDislikeController;
use App\Http\Controllers\UiController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// UI
Route::get('/', [UiController::class, 'index']);
Route::get('posts', [UiController::class, 'postsIndex']);
Route::get('posts/{id}/details', [UiController::class, 'postDetailsIndex']);

Route::post('post/like/{postId}', [LikeDislikeController::class, 'like']);
Route::post('post/dislike/{postId}', [LikeDislikeController::class, 'dislike']);

Route::post('post/comment/{postId}', [CommentController::class, 'comment']);

// ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index']);

    #user
    Route::get('users', [UserController::class, 'index']);

    #edit
    Route::get('users/{id}/edit', [UserController::class, 'edit']);

    #update
    Route::put('users/{id}/update', [UserController::class, 'update']);

    #delete
    Route::delete('users/{id}/delete', [UserController::class, 'delete']);

    #skill
    Route::resource('skills', SkillController::class);

    #project
    Route::resource('projects', ProjectController::class);

    #student count
    Route::get('student_counts', [StudentCountController::class, 'index'])->name('student_counts.index');
    Route::post('student_counts/store', [StudentCountController::class, 'store']);
    Route::put('student_counts/{id}/update', [StudentCountController::class, 'update']);

    #catrgory
    Route::resource('categories', CategoryController::class);

    #post
    Route::resource('posts', PostController::class);
    Route::post('comment/{commentId}/show_hide', [PostController::class, 'showHideComment']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');