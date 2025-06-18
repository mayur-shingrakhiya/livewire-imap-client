<?php

use Illuminate\Support\Facades\Route;
use Modules\Email\Livewire\EmailDashboard;

Route::prefix('admin')->middleware(['auth:admins'])->group(function () {
    Route::get('/email', EmailDashboard::class)->name('email.index');
});
