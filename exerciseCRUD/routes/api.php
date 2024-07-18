<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\exerciseController;

Route::get('/exercise', [exerciseController::class, 'get']);

Route::post('/exercise',[exerciseController::class, 'create'] );

Route::put('/exercise/{id}', [exerciseController::class, 'up']);

Route::delete('/exercise/{id}', [exerciseController::class, 'del']);