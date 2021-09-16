<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function index(){
        return Event::all();
    }

    public function store(){
        $title = "Evento pelo eloquent" . rand(1, 100);
        $event = [
            'title' => $title,
            'description' => 'Descrição do evento',
            'body' => 'Conteudo do evento',
            'start_event' => Date('Y-m-d H:i:s'),
            'slug' => \Illuminate\Support\Str::slug($title)
        ];

        return Event::create($event);
    }

    public function update($event){
        $title = "Evento pelo eloquent" . rand(1, 1000);
        $eventData = [
            'title' => $title,
            'description' => 'Descrição do evento',
            'body' => 'Conteudo do evento',
            'start_event' => Date('Y-m-d H:i:s'),
            'slug' => \Illuminate\Support\Str::slug($title)
        ];

        $event = Event::find($event);

        $event->update($eventData); //se retornasse aqui seria um booleano

        return $event; //retorna o objeto

    }

    public function destroy($event){
        $event = Event::findOrFail($event);
        return $event->delete();
    }


} //endclass
