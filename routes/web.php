<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('post', [PostController::class, 'index'])->name('post.index');
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post/create', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/{id}/edit', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::resource('artikel', ArtikelController::class);
});