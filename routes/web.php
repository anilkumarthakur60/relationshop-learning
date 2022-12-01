<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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


Route::controller(PostController::class)->group(function () {
    Route::get('posts/with-exists', 'withExists');
    Route::get('posts/with-aggregate', 'withAggregate');
    Route::get('posts/where-belongs-to', 'whereBelongsTo');
    Route::get('posts/where-belongs-to', 'whereBelongsTo');

});

Route::controller(TagController::class)->group(function () {
    Route::get('tags/latest-category', 'latestCategory');
    Route::get('tags/oldest-of-many', 'oldestOfMany');
    Route::get('tags', 'index');


});
