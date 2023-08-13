<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserCntroller;
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


// --------------------------PUBLIC ROUTE-------------------------------------------------
Route::post('signup', [UserCntroller::class, "signUp"]);
Route::get("", [ProductController::class, "index"]); // SHOW ALL
Route::get("/{id}", [ProductController::class, "show"]); // SHOW ITEM BY ID
Route::get('search/{name}', [ProductController::class, 'search']); // SHOW ITEM BY NAME
// --------------------------PUBLIC ROUTE-------------------------------------------------



// ----------------------------------PROTECTED ROUTE----------------------------------------------
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post("add-item", [ProductController::class, "store"]); // add item
    Route::put("/edit/{id}", [ProductController::class, "update"]); // update item
    Route::delete("/delete/{id}", [ProductController::class, "destroy"]); // delete it
});
// ----------------------------------PROTECTED ROUTE----------------------------------------------
