<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/dologin', [LoginController::class, 'dologin'])->name('dologin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard');

    Route::post('/eventlist/profile_list', [EventController::class, 'event_list'])->name('event.list');
    Route::resource('event', EventController::class);
});
