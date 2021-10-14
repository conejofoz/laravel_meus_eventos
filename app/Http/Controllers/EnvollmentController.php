<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EnvollmentController extends Controller
{
    public function start(Event $event)
    {
        session()->put('enrollment', $event->id);

        return redirect()->route('enrollment.confirm');
    }


    public function confirm()
    {
        if(!session()->has('enrollment')) 
            return redirect()->route('home');

        $event = Event::find(session('enrollment'));
        //dd($event);
        return view('enrollment-confirm', compact('event'));
    }


    public function proccess()
    {
        dd('chegammos aqui');
    }


}
