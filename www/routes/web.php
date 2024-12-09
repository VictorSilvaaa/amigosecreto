<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/group', [GroupController::class, 'create'])->name('group.create');
Route::post('/group', [GroupController::class, 'store'])->name('group.store');