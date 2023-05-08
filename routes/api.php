<?php

use App\Http\Controllers\AbcController;
use App\Http\Controllers\AdvancePaymentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExtensionOrderController;
use App\Http\Controllers\ExtensionResumptionController;
use App\Http\Controllers\FinalBillingController;
use App\Http\Controllers\FirstBillingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObrController;
use App\Http\Controllers\OtherDocumentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProgressBillingController;
use App\Http\Controllers\RetentionMoneyController;
use App\Http\Controllers\ScopeOfWorkController;
use App\Http\Controllers\SuspensionOrderController;
use App\Http\Controllers\SuspensionResumptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationOrderController;
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
Route::resource('extensionorders', ExtensionOrderController::class);
Route::resource('extensionresumptions', ExtensionResumptionController::class);
Route::resource('suspensionorders', SuspensionOrderController::class);
Route::resource('suspensionresumptions', SuspensionResumptionController::class);
Route::resource('variationorders', VariationOrderController::class);
Route::resource('otherdocuments', OtherDocumentController::class);
Route::resource('firstbillings', FirstBillingController::class);
Route::resource('progressbillings', ProgressBillingController::class);
Route::resource('finalbillings', FinalBillingController::class);
Route::resource('payments', PaymentController::class);
Route::resource('retentionmoneys', RetentionMoneyController::class);
Route::post("user-signin", [LoginController::class, 'userLogin']);