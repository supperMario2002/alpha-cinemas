<?php


use App\Http\Controllers\Admin\UserAdminController;
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
Route::post('/admin/create', [UserAdminController::class, 'store']);
Route::get('/admin/{id}/edit', [UserAdminController::class, 'getAdminById']);
Route::put('/admin/{id}', [UserAdminController::class, 'updateAdmin']);

Route::post('/user/create', [UserAdminController::class, 'storeUser']);
Route::get('/user/index', [UserAdminController::class, 'indexUser']);
Route::get('/user/{id}/edit', [UserAdminController::class, 'getUserById']);
Route::put('/user/{id}', [UserAdminController::class, 'updateUser']);