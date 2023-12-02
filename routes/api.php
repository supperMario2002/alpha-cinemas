<?php

use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\client\Auth\LoginClientController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\client\MovieControler;
use App\Http\Controllers\client\SeatController;
use Illuminate\Http\Request;
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
// Authentication route
Route::post('admin/login', [LoginAdminController::class, 'login']);

// Authenticated routes for admin
Route::middleware(['auth:sanctum', 'auth:admin'])->group(function () {
    Route::get('admin', [UserAdminController::class, 'getAdmin']);
    Route::get('admin/logout', [UserAdminController::class, 'logoutAdmin']);

    Route::prefix('admin')->group(function () {
        Route::get('index', [UserAdminController::class, 'indexAdmin']);
        Route::post('create', [UserAdminController::class, 'storeAdmin']);
        Route::get('{id}/edit', [UserAdminController::class, 'getAdminById']);
        Route::put('{id}', [UserAdminController::class, 'updateAdmin']);
    });

    Route::prefix('user')->group(function () {
        Route::get('index', [UserAdminController::class, 'indexUser']);
        Route::get('{id}/edit', [UserAdminController::class, 'getUserById']);
        Route::put('{id}', [UserAdminController::class, 'updateUser']);
    });

    Route::prefix('room')->group(function () {
        Route::get('index', [RoomController::class, 'index']);
        Route::post('create', [RoomController::class, 'store']);
        Route::get('{id}/edit', [RoomController::class, 'edit']);
        Route::put('{id}', [RoomController::class, 'update']);
        Route::delete('{id}', [RoomController::class, 'delete']);
    });

    Route::prefix('category')->group(function () {
        Route::get('index', [CategoryController::class, 'index']);
        Route::post('create', [CategoryController::class, 'store']);
        Route::get('{id}/edit', [CategoryController::class, 'edit']);
        Route::put('{id}', [CategoryController::class, 'update']);
    });

    Route::prefix('movie')->group(function () {
        Route::get('index', [MovieController::class, 'index']);
        Route::post('create', [MovieController::class, 'store']);
        Route::get('{id}/edit', [MovieController::class, 'edit']);
        Route::put('{id}', [MovieController::class, 'update']);
        Route::delete('{id}', [MovieController::class, 'delete']);
    });

    Route::prefix('schedule')->group(function () {
        Route::get('index', [ScheduleController::class, 'index']);
        Route::post('create', [ScheduleController::class, 'store']);
        Route::get('{id}/edit', [ScheduleController::class, 'edit']);
        Route::put('{id}', [ScheduleController::class, 'update']);
        Route::delete('{id}', [ScheduleController::class, 'delete']);
    });

    Route::prefix('voucher')->group(function () {
        Route::get('index', [VoucherController::class, 'index']);
        Route::post('create', [VoucherController::class, 'store']);
        Route::get('{id}/edit', [VoucherController::class, 'edit']);
        Route::put('{id}', [VoucherController::class, 'update']);
        Route::delete('{id}', [VoucherController::class, 'delete']);
    });
});


//Client routes


// Authentication client routes
Route::post('client/login', [LoginClientController::class, 'login']);
Route::post('user/create', [LoginClientController::class, 'register']);

// Authenticated client routes
Route::middleware(['auth:sanctum', 'auth:user'])->group(function () {
    Route::get('user/info', [LoginClientController::class, 'getUser']);
    Route::get('user/logout', [LoginClientController::class, 'logout']);
    Route::post('vnpay_payment', [CheckoutController::class, 'vnpayPayment']);
});
Route::get('vnpay_php/vnpay_return', [CheckoutController::class, 'ipn']);

// Checkout route

// Movie routes
Route::prefix('client/movie')->group(function(){
    Route::get('index', [MovieControler::class, 'index']);
    Route::get('{slug}/show', [MovieControler::class, 'movieBySlug']);
    Route::get('seat', [SeatController::class, 'index']);
    Route::get('seat_types', [SeatController::class, 'seatType']);
});
