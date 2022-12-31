<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ViewDataController;
use App\Http\Controllers\CategoryController;

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

Route::get('dynamic-table-data/{dynamicApiRequest}', [ProductController::class, 'dynamicTable'])->name('dynamic-table');

Route::resources([
    'view-data' => ViewDataController::class,
    'categories' => CategoryController::class,
    'posts' => PostController::class,
    'tags' => TagController::class,

]);