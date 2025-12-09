<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\Jemaat\Index as JemaatIndex;
use App\Livewire\Jemaat\Create as JemaatCreate;
use App\Livewire\Jemaat\Edit as JemaatEdit;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', DashboardIndex::class)->name('dashboard');
    
    // Jemaat routes
    Route::get('jemaat', JemaatIndex::class)->name('jemaat.index');
    Route::get('jemaat/create', JemaatCreate::class)->name('jemaat.create');
    Route::get('jemaat/{id}/edit', JemaatEdit::class)->name('jemaat.edit');
    
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';
