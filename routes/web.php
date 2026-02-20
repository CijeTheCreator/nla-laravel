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

Route::get('/archive', Archive::class)->name('archive.index');
Route::get('/archive/{volumeId}', Volume::class)->name('archive.volume');
Route::get('/archive/{volumeId}/{articleId}', Article::class)->name('archive.article');

Route::get('/editorial-team', EditorialTeam::class)->name('editorial.team');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/note-to-authors', NotesToAuthors::class)->name('notes.authors');

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::prefix('archive')
            ->name('archive.')
            ->group(function () {
                Route::get('/create', [VolumeController::class, 'create'])->name('create');
                Route::post('/create', [VolumeController::class, 'store'])->name('store');
                Route::get('/{volume}/edit', [VolumeController::class, 'edit'])->name('edit');
                Route::put('/{volume}/edit', [VolumeController::class, 'update'])->name('update');
                Route::delete('/{volume}/delete', [VolumeController::class, 'destroy'])->name('destroy');
            });

        Route::prefix('article')
            ->name('article.')
            ->group(function () {
                Route::get('/create', [ArticleController::class, 'create'])->name('create');
                Route::post('/create', [ArticleController::class, 'store'])->name('store');
                Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('edit');
                Route::put('/{article}/edit', [ArticleController::class, 'update'])->name('update');
                Route::delete('/{article}/delete', [ArticleController::class, 'destroy'])->name('destroy');
            });
    });

Route::view('/login', 'login')->name('login');
Route::post('/login', Login::class)->name('login.attempt');
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');
