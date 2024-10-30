<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketypeController;
use App\Http\Controllers\User_to_EventController;
use App\Http\Controllers\UserController;
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

Route::get('/registr', [RegistrationController::class,'registr'])->name('registr');
Route::post('/registr', [RegistrationController::class,'store'])->name('registr.post');

Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'login_post'])->name('login.post');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class,'index'])->name('index');
    Route::group(['prefix' => 'users'], function () {
        Route::get('/data', [HomeController::class,'data'])->name('user.data');
        Route::get('/edit/{id}', [UserController::class,'edit'])->name('user.edit');
        Route::post('/update', [UserController::class,'update'])->name('user.update');
        Route::get('/user-detail/{id}', [UserController::class,'detail'])->name('user.detail');
    });

    Route::group(['prefix' => 'events'], function () {
        Route::get('/new-event', [EventController::class,'index'])->name('newEvent');
        Route::post('/new-event', [EventController::class,'store'])->name('event.store');
        Route::get('/edit/{id}', [EventController::class,'edit'])->name('event.edit');
        Route::post('/update', [EventController::class,'update'])->name('event.update');
        Route::get('/event-detail/{id}', [EventController::class,'detail'])->name('event.detail');
        Route::get('/delete/{id}', [EventController::class,'delete'])->name('event.delete');

        Route::post('/user-to-event', [User_to_EventController::class,'join'])->name('user.join.event');
        Route::post('/user-leave-event', [User_to_EventController::class,'leave'])->name('user.leave.event');
    });

    Route::group(['prefix' => 'ticketypes'], function () {
        Route::get('/new-ticket-type', [TicketypeController::class,'index'])->name('newTicketype');
        Route::post('/new-ticket-type', [TicketypeController::class,'store'])->name('ticketype.store');
        Route::get('/data', [TicketypeController::class,'data'])->name('ticketype.data');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/new-order', [OrderController::class,'index'])->name('newOrder');
        Route::post('/new-order', [OrderController::class,'store'])->name('order.store');
        Route::get('/data', [OrderController::class,'data'])->name('order.data');
    });
});
