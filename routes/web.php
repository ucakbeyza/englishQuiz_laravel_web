<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beyza;
use App\Http\Controllers\KelimeController;
use App\Http\Controllers\ProjeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ucaak', function () {
    return view('ucakk');
});
Route::get('/beyza', function () {
    return view('beyza');
});
Route::get('/xxx', function () {
    return view('yagmur');
});
Route::get('/hava', function () {
    return view('yagmur');
});

Route::get('/ucak',[beyza::class, 'ucak']);
Route::get('/ipek',[beyza::class, 'agac']);
Route::get('/su',[beyza::class, 'deniz']);
Route::get('/hava',[beyza::class, 'gunes']);
Route::get('/veritestekle',[beyza::class, 'veriekle']);
Route::get('/ekleme',[KelimeController::class, 'ekleme']);
Route::get('/eklemeyap', [KelimeController::class, 'veritabaniyaz']);

// Kelime ile ilgili routelar burada 
Route::get('/liste',[KelimeController::class, 'liste'])->name('liste');
Route::get('/testekleme',[KelimeController::class, 'testekleme'])->name('testekleme');
Route::get('/soruekleme',[KelimeController::class, 'soruekle'])->name('soruekleme');
Route::post('/testeklemeyap',[KelimeController::class, 'testeklemeyap'])->name('testeklepost');
Route::post('/sorueklemeyap',[KelimeController::class, 'sorueklemeyap'])->name('sorueklepost');

/* Yeni Eklenenler */

Route::get('/prj-liste',[ProjeController::class, 'liste'])->name('prjliste');
Route::get('/prj-soruekleme',[ProjeController::class, 'soruekle'])->name('prjsoruekleme');
Route::post('/prj-sorueklemeyap',[ProjeController::class, 'sorueklemeyap'])->name('prjsorueklepost');
Route::get('/prj-soruduzenleme/{soruid}',[ProjeController::class, 'soruduzenle'])->name('prjsoruduzenle');
Route::post('/prj-soruduzenlemeyap/{soruid}',[ProjeController::class, 'soruduzenlemeyap'])->name('prjsoruduzenlepost');
Route::get('/prj-sorusilme/{soruid}',[ProjeController::class, 'sorusil'])->name('prjsorusil');
