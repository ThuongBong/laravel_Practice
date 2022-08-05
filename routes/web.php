<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'student'], function() {
    Route::get("/list",[\App\Http\Controllers\studentController::class,"studentList"]);

    Route::get("/create",[\App\Http\Controllers\studentController::class,"studentForm"]);
    Route::post("/create",[\App\Http\Controllers\studentController::class,"studentCreate"]);

    Route::get("/edit/{id}",[\App\Http\Controllers\studentController::class,"studentEdit"]);
    Route::put("/edit/{student:id}",[\App\Http\Controllers\studentController::class,"studentUpdate"]);

    Route::delete("/delete/{student}",[\App\Http\Controllers\studentController::class,"studentDelete"]);
});
