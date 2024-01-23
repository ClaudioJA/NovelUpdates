<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\NovelController::class, 'Homepage']);

Route::get('/novel/{id}', [App\Http\Controllers\NovelController::class, 'viewDetail']);

Route::get('/group/{id}', [App\Http\Controllers\GroupController::class, 'GroupDetail']);

Route::get('/genre/{id}', [App\Http\Controllers\NovelController::class, 'viewDetail']);

Auth::routes();

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/userList', 'AdminController@index')->middleware('admin');
});
