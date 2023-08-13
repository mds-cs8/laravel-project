<?php

use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// add route
// Route::get("", [ProductController::class, "index"]);
// Route::post("add-item", [ProductController::class, "store"]);
// Route::get("/{id}", [ProductController::class, "show"]);
// Route::post("/edit/{id}", [ProductController::class, "update"]);
// Route::get("/delete/{id}", [ProductController::class, "destroy"]);

Route::resource('product', ProductController::class);
Route::get('search/{name}', [ProductController::class, 'search']);
