<?php

use App\Http\Controllers\Api\ExpenseCategoryApiController;
use App\Http\Controllers\Api\ExpenseRecordApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::prefix('v1/')->group(function (){
    Route::post('/register', [AuthController::class, 'createUser']);
    Route::post('/login', [AuthController::class, 'loginUser']);
});




Route::group(['prefix' => 'v1/', 'middleware' => ['auth:sanctum']], function (){
    Route::get('/', [HomeController::class, 'apiIndex'])->name('home');
    Route::apiResources([
        'expense_categories' => ExpenseCategoryApiController::class,
        'expense_records' => ExpenseRecordApiController::class,
    ]);
});
