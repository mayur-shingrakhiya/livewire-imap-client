<?php

use Modules\Admin\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;

Route::prefix('admin')->middleware(['auth:admins'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
});
