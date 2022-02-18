<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\{
    LoginController,
    LogoutController,
    RegisterController,
    UserController
};

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

// Auth ...
Route::post('/login', LoginController::class);
Route::post('/register', RegisterController::class);
Route::post('/logout', LogoutController::class);

// User ...
Route::get('/user', UserController::class)->middleware(['auth:sanctum']);

// Register
// Route::post('/auth/register', [AuthController::class, 'register']);

// Login
// Route::post('/auth/login', [AuthController::class, 'login']);

// Middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/auth/me', function (Request $request) {
        return $request->user();
    });
    // Route::post('auth/logout', [AuthController::class, 'logout']);

    // App
    Route::apiResource('/books', BookController::class);
    Route::apiResource('/books/{book}/customers', CustomerController::class);
    Route::apiResource('/books/{book}/customers/{customer}/entries', EntryController::class);
});
