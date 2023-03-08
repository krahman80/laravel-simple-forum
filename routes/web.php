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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('c/{slug}', [App\Http\Controllers\CommunityController::class, 'show'])->name('communities.show');
Route::get('p/{postId}', [\App\Http\Controllers\CommunityPostController::class, 'show'])->name('communities.posts.show');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('communities', App\Http\Controllers\CommunityController::class)->except(['show']);
    Route::resource('communities.post', App\Http\Controllers\CommunityPostController::class)->except(['show']);
});
