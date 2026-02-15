<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Logout;
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

Route::view('/login', 'login')
    ->name('login');

Route::post('/login', Login::class);

// Logout route
Route::post('/logout', Logout::class)->middleware('auth');
