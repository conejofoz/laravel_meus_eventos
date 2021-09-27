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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'] );


/* Route::get('/eventos/{slug}', [\App\Http\Controllers\HomeController::class, 'show'])->name('event.single');


Route::get('/queries', function(){
    //$events = \App\Models\Event::all();
    //return $events;
    $event = \App\Models\Event::where('id',1)->first();
    return $event;
});



Route::get('/salvar', function(){
    $event = new \App\Models\Event;
    $event->title = "Evento pelo eloquent";
    $event->description = 'Descrição do evento';
    $event->body = 'Conteudo do evento';
    $event->start_event = Date('Y-m-d H:i:s');
    $event->slug = \Illuminate\Support\Str::slug($event->title);
    if($event->save()){
        return 'Salvo com sucesso!';

    } else {
        return 'Erro';
    }
}); */


/**
 * Rotas do laravel 8
 */
/* Route::get('/admin/events/index', [\App\Http\Controllers\Admin\EventController::class, 'index']);
Route::post('/admin/events/store', [\App\Http\Controllers\Admin\EventController::class, 'store']);
Route::get('/admin/events/create', [\App\Http\Controllers\Admin\EventController::class, 'create']);
Route::post('/admin/events/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update']);
Route::get('/admin/events/{event}/edit', [\App\Http\Controllers\Admin\EventController::class, 'edit']);
Route::get('/admin/events/destroy/{event}', [\App\Http\Controllers\Admin\EventController::class, 'destroy']);
 */

Route::prefix('/admin')->name('admin.')->group(function(){
    /* Route::prefix('/events')->name('events.')->group(function(){
        Route::get('/', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('index');
        Route::post('/store', [\App\Http\Controllers\Admin\EventController::class, 'store'])->name('store');
        Route::get('/create', [\App\Http\Controllers\Admin\EventController::class, 'create'])->name('create');
        Route::post('/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('update');
        Route::get('/{event}/edit', [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('edit');
        Route::get('/destroy/{event}', [\App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('destroy');

    }); */

    Route::resource('events', \App\Http\Controllers\Admin\EventController::class);

 });



 /* Route::resources([
     'events', \App\Http\Controllers\Admin\EventController::class,
     'events.photos', \App\Http\Controllers\Admin\EventPhotoController::class
    ]); */

 

 
 