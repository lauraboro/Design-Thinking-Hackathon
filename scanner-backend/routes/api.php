<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ScanController;
use Illuminate\Support\Facades\Route;

Route::post('/scan', [ScanController::class, 'scanBarcode']);

Route::delete('/deleteProduct/{productName}/{listId}', [ListController::class, 'deleteProduct']);
Route::get('/getProducts/{listId}', [ListController::class, 'getProducts']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

