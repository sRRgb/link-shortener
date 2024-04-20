<?php

declare(strict_types = 1);

use App\Http\Controllers\LinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', static function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/shortener', [LinkController::class, 'store']);
Route::get('/{code}', [LinkController::class, 'redirect']);
