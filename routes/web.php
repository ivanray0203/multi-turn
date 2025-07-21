<?php

use App\Http\Controllers\MultiTurnChatController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [MultiTurnChatController::class,'index'])->name('dashboard');
    Route::post('/dashboard', [MultiTurnChatController::class,'chat'])->name('dashboard.chat');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
