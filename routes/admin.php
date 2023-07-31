<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
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

    //Auth
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/dologin', [LoginController::class, 'dologin'])->name('dologin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    //Dashboard
    Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard');

    //Event
    Route::post('/eventlist/event_list', [EventController::class, 'event_list'])->name('event.list');
    Route::post('/event/{doctor}/activate/toggle', [EventController::class, 'activateToggle'])->name('event.activate.toggle');
    Route::resource('event', EventController::class);

    //Category
    Route::post('/category/list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('/category/status/{id}', [CategoryController::class, 'status']);
    Route::resource('category', CategoryController::class);
});
