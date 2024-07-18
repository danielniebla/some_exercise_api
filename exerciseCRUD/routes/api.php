<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/exercise', function () {
    return 'This is the exercise get route';
});
Route::get('/exercise/{id}', function () {
    return 'This is the exercise get by id route';
});
Route::post('/exercise', function () {
    return 'This is the exercise post route';
});
Route::put('/exercise/{id}', function () {
    return 'This is the exercise put route';
});
Route::delete('/exercise/{id}', function () {
    return 'This is the exercise delete route';
});