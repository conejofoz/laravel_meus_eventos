<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\EventPhotoRequest;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class EventPhotoController extends Controller
{
    public function index($event)
    {
        $event = Event::find($event);
        return view('admin.events.photos', compact('event'));
    }


    public function create()
    {


    }


    public function store(EventPhotoRequest $request, $event)
    {
        //$photos = $request->file('photos');

        $uploadedPhotos = [];

        foreach ($request->file('photos') as $photo) {
            $uploadedPhotos[] = ['photo' => $photo->store('events/photos', 'public')];
        }

        $event = \App\Models\Event::find($event);
        $event->photos()->createMany($uploadedPhotos);

        return redirect()->back();

    }


    //public function destroy($event, $photo) //$event é um id
    
    /**
     *tipando o parâmetro o laravel já traz um model Event populado
     *facilitando a escrita, por exemplo não necessita fazer um find toda vez
     */
    public function destroy(Event $event, $photo)
    {
        //print $event . ' - ' . $photo;

        $onePhoto = $event->photos()->find($photo);

        if(!$onePhoto)
            return redirect()->route('admin.events.index');

        if(Storage::disk('public')->exists($onePhoto->photo)){
            Storage::disk('public')->delete($onePhoto->photo);
        }

        $onePhoto->delete();

        return redirect()->back();
        
    }
}
