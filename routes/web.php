<?php

use Illuminate\Support\Facades\Route;

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


//Categories

use App\Http\Controllers\CategoryController;
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');


Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


//Posts

use App\Http\Controllers\PostController;
Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/show/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/delete/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



