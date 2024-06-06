<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\GoalController;

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', function () {
    $posts = Post::with('user')->get();  // Fetch posts with their associated user
    return view('posts', ['posts' => $posts]);
});

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/settings', [UserController::class, 'settings']);
Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update-profile');
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::delete('/admin/remove-post/{id}', [AdminController::class, 'removePost'])->name('admin.removePost');
Route::delete('/admin/remove-user/{id}', [AdminController::class, 'removeUser'])->name('admin.removeUser');

//github routes 
Route::get('/auth/github/redirect', [GithubController::class, 'handleGithubRedirect']);
Route::get('/auth/github/callback', [GithubController::class, 'handleGithubCallback']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

 
 
Route::get('/goals', 'App\Http\Controllers\GoalController@index')->name('goals.index');
Route::post('/goals', 'App\Http\Controllers\GoalController@store')->name('goals.store');
Route::post('/goals/{goal}/complete', 'App\Http\Controllers\GoalController@markAsCompleted')->name('goals.complete');
Route::delete('/goals/{goal}', 'App\Http\Controllers\GoalController@destroy')->name('goals.destroy');
