<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ManageEventController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('calendar', [HomeController::class, 'calendar'])->name('calendar');
// Route::post('manage_event', [HomeController::class, 'manage_event'])->name('manage_event');

Route::resource('manage_event', ManageEventController::class);
