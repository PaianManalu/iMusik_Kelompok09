<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\ContactController;
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
    return view('home', ['title' => 'Home']);
})->name('home');
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('fetch_video', [UserController::class, 'fetch'])->name('fetch');
Route::post('fetch_video', [UserController::class, 'fetch'])->name('fetch');
Route::get('/fetch_video', [App\Http\Controllers\VideoController::class, 'fetch']);
Route::get('/search', [App\Http\Controllers\VideoController::class, 'search'])->name('search');
Route::get('/index', [App\Http\Controllers\VideoController::class, 'index']);
Route::delete('/file', [App\Http\Controllers\VideoController::class, 'delete'])->name('delete.file');
Route::put('/update/{file_id}', [App\Http\Controllers\VideoController::class, 'update'])->name('update.file');
Route::get('/edit/{file_id}', [App\Http\Controllers\VideoController::class, 'edit'])->name('edit.file');
Route::delete('/delete/{file_id}', [App\Http\Controllers\VideoController::class, 'delete'])->name('delete.file');
Route::post('/insert_video', [App\Http\Controllers\VideoController::class, 'insert'])->name('insert.file');


// Definisikan rute-rute lainnya sesuai kebutuhan Anda
Route::get('/videos', [PlaylistController::class, 'index'])->name('videos.index');

Route::get('/videos', [PlaylistController::class, 'index'])->name('videos.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/videos', [VideoController::class, 'fetch'])->name('videos.fetch');

// routes/web.php
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::view('/upload', 'upload')->name('upload.form');
Route::view('/hapus', 'hapus')->name('hapus.form');
