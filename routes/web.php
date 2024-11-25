<?php

use App\Livewire\Dashboard\Overview;
use App\Livewire\Users\Index as UsersIndex;
use App\Livewire\Users\Create as UsersCreate;
use App\Livewire\Users\Edit as UsersEdit;
use App\Livewire\Absen\Index as AbsenIndex;
use App\Livewire\Jadwal\Index as JadwalIndex;
use App\Livewire\Jadwal\Create as JadwalCreate;
use App\Livewire\Jadwal\Edit as JadwalEdit;
use App\Livewire\Mapel\Index as MapelIndex;
use App\Livewire\Mapel\Create as MapelCreate;
use App\Livewire\Mapel\Edit as MapelEdit;
use App\Livewire\Kelas\Index as KelasIndex;
use App\Livewire\Kelas\Create as KelasCreate;
use App\Livewire\Kelas\Edit as KelasEdit;
use Illuminate\Support\Facades\Route;

// Redirect URL utama ke dashboard
Route::get('/', function() {
    return redirect()->route('dashboard');
});

Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', Overview::class)->name('dashboard');
    
    // Users Management
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', UsersIndex::class)->name('index');
        Route::get('/create', UsersCreate::class)->name('create');
        Route::get('/{user}/edit', UsersEdit::class)->name('edit');
    });

    // Absensi
    Route::prefix('absen')->name('absen.')->group(function () {
        Route::get('/', AbsenIndex::class)->name('index');
    });
    
    // Jadwal Pelajaran
    Route::prefix('jadwal')->name('jadwal.')->group(function () {
        Route::get('/', JadwalIndex::class)->name('index');
        Route::get('/create', JadwalCreate::class)->name('create');
        Route::get('/{jadwal}/edit', JadwalEdit::class)->name('edit');
    });
    
    // Mata Pelajaran
    Route::prefix('mapel')->name('mapel.')->group(function () {
        Route::get('/', MapelIndex::class)->name('index');
        Route::get('/create', MapelCreate::class)->name('create');
        Route::get('/{mapel}/edit', MapelEdit::class)->name('edit');
    });
    
    // Kelas
    Route::prefix('kelas')->name('kelas.')->group(function () {
        Route::get('/', KelasIndex::class)->name('index');
        Route::get('/create', KelasCreate::class)->name('create');
        Route::get('/{kelas}/edit', KelasEdit::class)->name('edit');
    });
});