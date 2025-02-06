<?php

use App\Http\Controllers\KelimeController;
use App\Http\Controllers\ProjeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/sorular', [KelimeController::class,'servissorular']);
Route::get('/prjsorular', [ProjeController::class,'servissorular']);
