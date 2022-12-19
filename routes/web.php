<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sendNotifiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //receive post request
    Route::post('/add-post', [PostController::class, 'addPostFunction'])->name('addPostName');
    Route::get('/all-posts', [PostController::class, 'rekheDebo'])->name('allPostName');

    Route::get('/edit-post/{id}', [PostController::class, 'editPostFunction'])->name('editPostName');
    Route::post('/update-post/{id}', [PostController::class, 'updatePostFunction'])->name('updatePostName');

    Route::get('/delete-post/{id}', [PostController::class, 'deletePostFunction'])->name('deletePostName');


    //notification sending test
    Route::get('/notification-test', [sendNotifiController::class, 'sendNotifi'])->name('sendNotifi');
});

require __DIR__.'/auth.php';
