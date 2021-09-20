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

Route::get('/', function () {

    //$events = \App\Models\Event::all();
    $events = [];
    //return view('welcome', ['events' => $events]);
    return view('welcome', compact('events'));
});


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
});


/**
 * Rotas do laravel 8
 */

 Route::get('/events/index', [\App\Http\Controllers\EventController::class, 'index']);
 Route::get('/events/store', [\App\Http\Controllers\EventController::class, 'store']);
 Route::get('/events/update/{event}', [\App\Http\Controllers\EventController::class, 'update']);
 Route::get('/events/destroy/{event}', [\App\Http\Controllers\EventController::class, 'destroy']);

 

 
 