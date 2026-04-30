<?php

use Illuminate\Support\Facades\Route;

Route::get('/kuis', function () {
    return view('Kuis');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/soal', function () {
    return view('Soal');
});
