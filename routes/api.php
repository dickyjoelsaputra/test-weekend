<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CostumerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test1', [CostumerController::class, 'testsatu']);
Route::get('/test2', [CostumerController::class, 'testdua']);
Route::get('/test3', [CostumerController::class, 'testtiga']);
Route::get('/test4', [CostumerController::class, 'testempat']);
Route::get('/test5', [CostumerController::class, 'testlima']); // gagal

Route::post('/testphp1', [TestController::class, 'testsatu']);
Route::post('/testphp2', [TestController::class, 'testdua']);
Route::post('/testphp3', [TestController::class, 'testiga']); // gagal
