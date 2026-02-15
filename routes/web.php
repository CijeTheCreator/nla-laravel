<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Logout;
use App\Http\Controllers\VolumeController;
use App\Livewire\Archive;
use App\Livewire\Article;
use App\Livewire\Contact;
use App\Livewire\EditorialTeam;
use App\Livewire\NotesToAuthors;
use App\Livewire\Volume;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/archive', Archive::class);
Route::get('/archive/{volumeId}', Volume::class);
Route::get('/archive/{volumeId}/{articleId}', Article::class);
Route::get('/editorial-team', EditorialTeam::class);
Route::get('/contact', Contact::class);
Route::get('/note-to-authors', NotesToAuthors::class);

Route::get('/admin/archive/{volume}/edit', [VolumeController::class, 'edit']);
Route::get('/admin/archive/create', [VolumeController::class, 'create']);
Route::post('/admin/archive/create', [VolumeController::class, 'store']);
Route::put('/admin/archive/{volume}/edit', [VolumeController::class, 'update']);
Route::delete('/admin/archive/{volume}/delete', [VolumeController::class, 'destroy']);

Route::get('/admin/article/{article}/edit', [ArticleController::class, 'edit']);
Route::get('/admin/article/create', [ArticleController::class, 'create']);
Route::post('/admin/article/create', [ArticleController::class, 'store']);
Route::put('/admin/article/{article}/edit', [ArticleController::class, 'update']);
Route::delete('/admin/article/{article}/delete', [ArticleController::class, 'destroy']);

Route::view('/login', 'login')
    ->name('login');

Route::post('/login', Login::class);

// Logout route
Route::post('/logout', Logout::class)->middleware('auth');
