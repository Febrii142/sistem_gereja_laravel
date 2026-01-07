<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\Jemaat\Index as JemaatIndex;
use App\Livewire\Jemaat\Create as JemaatCreate;
use App\Livewire\Jemaat\Edit as JemaatEdit;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KeuanganController;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', DashboardIndex::class)->name('dashboard');
    
    // Jemaat routes
    Route::get('jemaat', JemaatIndex::class)->name('jemaat.index');
    Route::get('jemaat/create', JemaatCreate::class)->name('jemaat.create');
    Route::get('jemaat/{id}/edit', JemaatEdit::class)->name('jemaat.edit');
    
    Route::view('profile', 'profile')->name('profile');
});

// Mockup UI Routes (without authentication for demonstration)
Route::prefix('mockup')->group(function () {
    Route::get('/', function () {
        return redirect()->route('mockup.dashboard');
    });
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('mockup.dashboard');
    Route::resource('jemaat', JemaatController::class)->names([
        'index' => 'mockup.jemaat.index',
        'create' => 'mockup.jemaat.create',
        'store' => 'mockup.jemaat.store',
        'show' => 'mockup.jemaat.show',
        'edit' => 'mockup.jemaat.edit',
        'update' => 'mockup.jemaat.update',
        'destroy' => 'mockup.jemaat.destroy',
    ]);
    Route::resource('jadwal', JadwalController::class)->names([
        'index' => 'mockup.jadwal.index',
        'create' => 'mockup.jadwal.create',
        'store' => 'mockup.jadwal.store',
        'show' => 'mockup.jadwal.show',
        'edit' => 'mockup.jadwal.edit',
        'update' => 'mockup.jadwal.update',
        'destroy' => 'mockup.jadwal.destroy',
    ]);
    Route::resource('keuangan', KeuanganController::class)->names([
        'index' => 'mockup.keuangan.index',
        'create' => 'mockup.keuangan.create',
        'store' => 'mockup.keuangan.store',
        'show' => 'mockup.keuangan.show',
        'edit' => 'mockup.keuangan.edit',
        'update' => 'mockup.keuangan.update',
        'destroy' => 'mockup.keuangan.destroy',
    ]);
});

require __DIR__.'/auth.php';
