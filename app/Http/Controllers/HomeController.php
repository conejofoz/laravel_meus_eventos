<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{

    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }
    
    public function index()
    {
        
        //$events = Event::all();
        $events = $this->event->orderBy('start_event', 'DESC')->paginate();
        //return view('welcome', ['events' => $events]);
        return view('home', compact('events'));

    }


    public function show($slug)
    {
        //$event = \App\Models\Event::where('slug', $slug)->first();
        //$event = Event::whereSlug($slug)->first();
        $event = $this->event->whereSlug($slug)->first();
        return view('event', compact('event'));
    }
}
