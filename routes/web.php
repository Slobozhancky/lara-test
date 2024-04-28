<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Home::class, 'index'])->name('home.home');

Route::get('/test', TestController::class)->name('home.test');

Route::get('/contacts', [Home::class, 'contacts'])->name('home.contacts');


