<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EntryController;

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

// Register
Route::post('/auth/register', [AuthController::class, 'register']);

// Login
Route::post('/auth/login', [AuthController::class, 'login']);

// Middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/auth/me', function (Request $request) {
        return $request->user();
    });
    Route::post('auth/logout', [AuthController::class, 'logout']);


    // Test
    Route::apiResource('/books', BookController::class);
    Route::apiResource('/books/{book}/customers', CustomerController::class);
    Route::apiResource('/books/{book}/customers/{customer}/entries', EntryController::class);
});
