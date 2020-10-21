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

Auth::routes();

Route::get('google', function () {
    return view('googleAuth');
});
Route::get('github', function () {
    return view('githubAuth');
});

    

Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class,'redirectToGoogle'])->name('redirectToGoogle');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class,'handleGoogleCallback'])->name('handleGoogleCallback');

Route::get('auth/github', [App\Http\Controllers\Auth\LoginController::class,'redirectToGithub'])->name('redirectToGithub');
Route::get('auth/github/callback', [App\Http\Controllers\Auth\LoginController::class,'handleGithubCallback'])->name('handleGithubCallback');



Route::get('/notes', [App\Http\Controllers\NotesController::class, 'index'])->name('notes');
Route::get('/edit/{id}', [App\Http\Controllers\NotesController::class, 'edit'])->name('edit');
Route::get('/new', [App\Http\Controllers\NotesController::class, 'new'])->name('new');
Route::delete('/delete/{id}', [App\Http\Controllers\NotesController::class, 'delete'])->name('delete');
Route::post('/update', [App\Http\Controllers\NotesController::class, 'update'])->name('update');
Route::post('/create', [App\Http\Controllers\NotesController::class, 'create'])->name('create');











Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
