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

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::prefix('archive')->group(function () {
        Route::get('/create', [VolumeController::class, 'create']);
        Route::post('/create', [VolumeController::class, 'store']);
        Route::get('/{volume}/edit', [VolumeController::class, 'edit']);
        Route::put('/{volume}/edit', [VolumeController::class, 'update']);
        Route::delete('/{volume}/delete', [VolumeController::class, 'destroy']);
    });

    Route::prefix('article')->group(function () {
        Route::get('/create', [ArticleController::class, 'create']);
        Route::post('/create', [ArticleController::class, 'store']);
        Route::get('/{article}/edit', [ArticleController::class, 'edit']);
        Route::put('/{article}/edit', [ArticleController::class, 'update']);
        Route::delete('/{article}/delete', [ArticleController::class, 'destroy']);
    });
});

Route::view('/login', 'login')
    ->name('login');

Route::post('/login', Login::class);

// Logout route
Route::post('/logout', Logout::class)->middleware('auth');
