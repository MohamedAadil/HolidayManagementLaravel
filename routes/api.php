<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HolidayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('holidays', [HolidayController::class, 'index']);
Route::get('holiday', [HolidayController::class, 'search']);
Route::post('/add-holiday', [HolidayController::class, 'store']);
Route::get('/edit-holiday/{id}', [HolidayController::class, 'edit']);
Route::put('update-holiday/{id}', [HolidayController::class, 'update']);
Route::delete('delete-holiday/{id}', [HolidayController::class, 'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});