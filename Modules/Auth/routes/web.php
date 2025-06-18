<?php

use Modules\Auth\Livewire\Login;
use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Livewire\Register;

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('auths', AuthController::class)->names('auth');
// });


Route::get('/', Login::class)->name('login')->middleware('guest:admins');
Route::get('/sign-up', Register::class)->name('admin.sign.up')->middleware('guest:admins');
