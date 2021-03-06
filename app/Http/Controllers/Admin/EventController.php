<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

//use App\Models\User;


class EventController extends Controller
{

    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;

        $this->middleware('user.can.event.edit')->only('edit', 'update');
    }


    public function index(){

       //$events = Event::all();
       //$events = Event::paginate(10);
       //$events = $this->event->paginate(10);
       $events = auth()->user()->events()->paginate(10);

        return view('admin.events.index', compact('events'));

    }



    public function show($event)
    {

    }



    public function store(EventRequest $request)
    {

        //receber a imagem
        //$banner = $request->file('banner');
        //tenta adivinhar o tipo do arquivo
        //dd($banner->guessExtension());
        //faz upload do arquivo na pasta banner
        //dd($banner->store('banner', 'public'));
        

        $event = $request->all();
        
        //se o input file vier vazio da erro no store
        //$event['banner'] = ($request->file('banner')->store('banner', 'public'));
        
        /**
         * verifica se o input foi preenchido e ao mesmo tempo atribui o resultado a variável banner
         * cria a chave banner no array event e atribui com o retorno
         * do método store que já é o nome do arquivo gerado com a pasta
         */
        if($banner = $request->file('banner'))
            $event['banner'] = $banner->store('banner', 'public');

        //$event['slug'] = Str::slug($event['title']); //vai ser criado pelo mutator agora
        $event['slug'] = $event['title'];

        //Event::create($event);
        $event = $this->event->create($event);

        $event->owner()->associate(auth()->user());
        $event->save();

        if($categories = $request->get('categories'))
        {
            $event->categories()->sync($categories);
        }

        \App\Services\MessageService::addFlash('success', 'Evento criado com sucesso!');
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

        $categories = Category::all(['id', 'name']);

        return view('admin.events.create', compact('categories'));
    }



    public function edit($event)
    //public function edit(Event $event)
    {

        $categories = Category::all(['id', 'name']);

        $event = Event::findOrFail($event);
        return view('admin.events.edit', compact('event', 'categories'));
    }




    public function update($event, EventRequest $request)
    {

        $event = $this->event->findOrFail($event);
        $eventData = $request->all();

        if($banner = $request->file('banner'))
        {
            if(Storage::disk('public')->exists($event->banner))
            {
                Storage::disk('public')->delete($event->banner);
            }

            $eventData['banner'] = $banner->store('banner', 'public');
        }

        $event->update($eventData);


        if($categories = $request->get('categories'))
        {
            $event->categories()->sync($categories);
        }

        \App\Services\MessageService::addFlash('success', 'Evento atualizado com sucesso!');
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
        \App\Services\MessageService::addFlash('success', 'Evento removido com sucesso!');
        return redirect()->route('admin.events.index');

    }


} //endclass
