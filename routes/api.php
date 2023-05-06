<?php

use App\Http\Controllers\AbcController;
use App\Http\Controllers\AdvancePaymentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ObrController;
use App\Http\Controllers\ScopeOfWorkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

// Route::get('index-user', [UserController::class, 'index']);
// Route::get('store-user', [UserController::class, 'store']);
Route::resource('users', UserController::class);
Route::resource('documents', DocumentController::class);
Route::resource('abcs', AbcController::class);
Route::resource('obrs', ObrController::class);
Route::resource('scopeofworks', ScopeOfWorkController::class);
Route::resource('advancepayments', AdvancePaymentController::class);