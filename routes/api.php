<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\User\UserController;
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
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});
Route::middleware(['auth:api', 'binding'])->group(function () {
    Route::apiResource('users', UserController::class);

    Route::apiResource('notifications', NotificationController::class)->only('index', 'store');
    Route::post('notifications/change_status/{notification}',[NotificationController::class, 'changeStatus']);

    Route::apiResource('invoices', InvoiceController::class)->only('index', 'show');
    Route::post('invoices/change_status/{invoice}', [InvoiceController::class, 'changeStatus']);
});
