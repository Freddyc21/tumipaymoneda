<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversionController;

Route::get('/', function () {
    return redirect('/api/auth/logueo');
});
Route::get('/conversion', [ConversionController::class, 'CargueConDatos'])->name('Conversion.index');