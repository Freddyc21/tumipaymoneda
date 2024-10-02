<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversionController;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/registro', function () {
        return view('Auth.registro');
    })->name('registrarse');
    Route::get('/logueo', function () {
        return view('Auth.login');
    })->name('logueo');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
    Route::get('/conversion', [ConversionController::class, 'index'])->middleware('auth:api')->name('Conversion.index');
    Route::post('/conversion', [ConversionController::class, 'store'])->name('Conversion.store');
});

//Route::get('/conversion', [ConversionController::class, 'index'])->name('Conversion.index');
