<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['photo'];

    


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    //deixando nesse local só para aproveitar as facilidades do vscode
    //mais isso não fica aqui
    public function teste()
    {
        
        //mass assign - passar um array para salvar
        $photo = ['photo' => 'imagem.jpg'];
        \App\Models\Event::find(1)->photos()->create($photo);
        

        //mass assign vários registros - passar um array de array
        $photo1 = ['photo' => 'imagem1.jpg'];
        $photo2 = ['photo' => 'imagem2.jpg'];
        $photos = [$photo1, $photo2];
        Event::find(1)->photos()->createMany($photos);



        //-------------------------------------------
        //---------active records
        $photo2 = new \App\Models\Photo();
        $photo2->photo = 'foto2.jpg';
        \App\Models\Event::find(1)->photos()->save($photo2);


        //active records salvando vários registros
        //namespace App\Models; 
        $photo1 = new Photo();
        $photo2 = new Photo();
        $photos = [$photo1, $photo2];
        Event::find(2)->photos()->saveMany($photos);


        $event = Event::find(1);
        $photos = $event->photos;
        $photos->map(function($onePhoto){ return $onePhoto->photo; });


    }

    
}
