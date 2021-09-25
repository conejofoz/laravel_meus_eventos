<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Event;


class EventController extends Controller
{


    public function index(){

       //$events = Event::all();
       $events = Event::paginate(10);

        return view('admin.events.index', compact('events'));

    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10',
            'description' => 'required',
            'body' => 'required',
            'start_event' => 'required',
        ]);

        $event = request()->all();

        $event['slug'] = Str::slug($event['title']);

        Event::create($event);

        return redirect()->route('admin.events.index');

    }


    public function store_test(){
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


    public function create()
    {

        return view('admin.events.create');
    }



    public function edit($event)
    {

        $event = Event::findOrFail($event);
        return view('admin.events.edit', compact('event'));
    }




    public function update($event)
    {

        $event = Event::findOrFail($event);

        $event->update(request()->all());

        return redirect()->back();

    }



    public function update_test($event){
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
        $event->delete();
        return redirect()->route('admin.events.index');

    }


} //endclass
