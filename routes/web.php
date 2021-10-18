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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


 Route::get('/eventos/{slug}', [\App\Http\Controllers\HomeController::class, 'show'])->name('event.single');

Route::prefix('/enrollment')->name('enrollment.')->group(function(){
    Route::get('/start/{event:slug}', [\App\Http\Controllers\EnvollmentController::class, 'start'])->name('start');
    Route::get('/confirm', [\App\Http\Controllers\EnvollmentController::class, 'confirm'])->name('confirm')->middleware('auth');
    Route::get('proccess', [\App\Http\Controllers\EnvollmentController::class, 'proccess'])->name('proccess')->middleware('auth');
});


Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function(){
   
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class);

    Route::resource('events.photos', \App\Http\Controllers\Admin\EventPhotoController::class)
    ->only(['index', 'store', 'destroy']);

    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

 });




 

 
 
Auth::routes();
