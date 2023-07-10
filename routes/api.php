<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Room\RoomController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/index', [UserAdminController::class, 'indexAdmin']);
Route::post('/admin/create', [UserAdminController::class, 'storeAdmin']);
Route::get('/admin/{id}/edit', [UserAdminController::class, 'getAdminById']);
Route::put('/admin/{id}', [UserAdminController::class, 'updateAdmin']);

Route::post('/user/create', [UserAdminController::class, 'storeUser']);
Route::get('/user/index', [UserAdminController::class, 'indexUser']);
Route::get('/user/{id}/edit', [UserAdminController::class, 'getUserById']);
Route::put('/user/{id}', [UserAdminController::class, 'updateUser']);

Route::post('/room/create', [RoomController::class, 'createRoom']);
Route::get('/room/index', [RoomController::class, 'indexRoom']);
Route::get('/room/{id}/edit', [RoomController::class, 'getRoomById']);
Route::put('/room/{id}', [RoomController::class, 'updateRoom']);
Route::delete('/room/delete/{id}', [RoomController::class, 'deleteRoom']);


Route::get('/category/index', [CategoryController::class, 'index']);
Route::post('/category/create', [CategoryController::class, 'store']);
