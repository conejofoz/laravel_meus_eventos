<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'body', 'slug', 'start_event'];

    protected $dates = ['start_event']; //para poder usar o format do carbon



    /**
     * Accessors
     */

    public function getTitleAttribute()
    {
        return 'Evento: ' . $this->attributes['title'];
    }


    public function getOwnerNameAttribute() // ->owner_name -> OwnerName
    {
        return !$this->owner ? 'Organizador não encontrado' : $this->owner->name;
    }




    /**
     * Mutators
     */

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }


    /**
     * Formatar a data para inserir no banco
     *  - Criar uma instância do DateTime em cima do valor que foi digitado lá no frontend
     *  - - respeitando o padrão de máscara que foi usado lá
     *  - - - primeiro parâmetro é o formato que foi usado no front e o segundo é o valor que foi digitado lá no front
     * - Usar o format para transformar essa instância do DateTime no formato americano para inserir no banco
     */
    public function setStartEventAttribute($value)
    {
        $this->attributes['start_event'] = (\DateTime::createFromFormat('d/m/Y H:i', $value))->format('Y-m-d H:i');
    }




    public function photos()
    {
        return $this->hasMany(Photo::class);
    }    

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
