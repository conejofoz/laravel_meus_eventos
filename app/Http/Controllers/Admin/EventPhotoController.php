<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventPhotoController extends Controller
{
    public function index($event)
    {
        return view('admin.events.photos', compact('event'));
    }


    public function create()
    {


    }


    public function store(Request $request, $event)
    {
        //dd($request->file('photos'));
        //$photos = $request->file('photos');

        $uploadedPhotos = [];

        foreach ($request->file('photos') as $photo) {
            $uploadedPhotos[] = ['photo' => $photo->store('events/photos', 'public')];
        }

        $event = \App\Models\Event::find($event);
        //dd($uploadedPhotos);
        $event->photos()->createMany($uploadedPhotos);

        return redirect()->back();

    }
}
