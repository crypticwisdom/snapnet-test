<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/register', [Controller::class, 'register']);
Route::post('/login', [Controller::class, 'authenticate']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('citizens', [Controller::class, 'getAllCitizens']);
});
