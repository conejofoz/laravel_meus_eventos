<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;



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


Route::middleware('auth', 'verified')->prefix('/admin')->name('admin.')->group(function(){
   
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class);

    Route::resource('events.photos', \App\Http\Controllers\Admin\EventPhotoController::class)
    ->only(['index', 'store', 'destroy']);

    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

 });





 Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
 

 
 
Auth::routes();
