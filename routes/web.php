<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversionController;


Route::get('/conversion', [ConversionController::class, 'index'])->name('Conversion.index');