<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Admin;



Route::get('/', function () {
    return view('welcome');
})->name('home');
//Authentication middleware group 
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', Admin\Dashboard::class)->name('dashboard');
    Route::prefix('candidates')->name('candidates')->group(function () {
        Route::get('/', Admin\Candidates\Index::class)->name('index');
        Route::get('/create', Admin\Candidates\Create::class)->name('create');
        Route::get('/{id}/edit', Admin\Candidates\Edit::class)->name('edit');
    });
    Route::prefix('interviews')->name('interviews')->group(function () {
        Route::get('/', Admin\Interviews\Index::class)->name('index');
        Route::get('/create', Admin\Interviews\Create::class)->name('create');
        Route::get('/{id}/edit', Admin\Interviews\Edit::class)->name('edit');
    });
    Route::prefix('jobs')->name('jobs')->group(function () {
        Route::get('/', Admin\Jobs\Index::class)->name('index');
        Route::get('/create', Admin\Jobs\Create::class)->name('create');
        Route::get('/{id}/edit', Admin\Jobs\Edit::class)->name('edit');
        Route::get('/whatsapp-contact', \App\Livewire\Admin\Jobs\WhatsappJobContact::class)
            ->name('whatsapp-contact');
        Route::get('/send-emails', \App\Livewire\Admin\Jobs\SendJobNewsletter::class)
            ->name('send-emails');
    });
    Route::prefix('communications')->name('communications')->group(function () {
        Route::get('/', Admin\Communications\Index::class)->name('index');
        Route::get('/{id}/show', Admin\Communications\Show::class)->name('show');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
