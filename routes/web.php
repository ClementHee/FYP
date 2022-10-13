<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profile_controller;
use App\Http\Controllers\event_controller;


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
Route::get('/', [Controller::class,'index']);
//Route::get('/blog',[usersController::class,'index']);

#self defined prefix
Route::prefix('/profile')->group(function(){
    Route::get('/create', [profile_controller::class,'create'])->name('profile.createprofile');
    Route::get('/edit/{profileId}', [profile_controller::class,'edit'])->name('profile.editprofile');
    Route::post('/', [profile_controller::class,'store'])->name('profile.storeprofile');
    Route::get('/{profileId}', [profile_controller::class,'show'])->name('profile.showprofile');
    Route::patch('/{profileId}', [profile_controller::class,'update'])->name('profile.updateprofile');
    Route::delete('/{profileId}', [profile_controller::class,'destroy'])->name('profile.deleteprofile');
    Route::get('/', [profile_controller::class,'index'])->name('profile.index');
});

Route::prefix('/events')->group(function(){
    Route::get('/create', [event_controller::class,'create'])->name('event.createevent');
    Route::get('/edit/{eventId}', [event_controller::class,'edit'])->name('event.editevent');
    Route::post('/', [event_controller::class,'store'])->name('event.storeevent');
    Route::get('/{eventId}', [event_controller::class,'show'])->name('event.showevent');
    Route::patch('/{eventId}', [event_controller::class,'update'])->name('event.updateevent');
    Route::delete('/{eventId}', [event_controller::class,'destroy'])->name('event.deleteevent');
    Route::get('/', [event_controller::class,'index'])->name('event.index');   
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
