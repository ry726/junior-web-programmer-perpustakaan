<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;

Route::redirect('/', '/perpustakaan');

Route::resource('perpustakaan', PerpustakaanController::class);
