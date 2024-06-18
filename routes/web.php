<?php

use App\Livewire\CreateListing;
use App\Livewire\GetListings;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', GetListings::class)->name('dashboard');
    Route::get( '/create-listing', CreateListing::class)->name('listing.create');
});


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
