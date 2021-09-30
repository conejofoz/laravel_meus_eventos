<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'body', 'slug', 'start_event'];

    protected $dates = ['start_event']; //para poder usar o format do carbon

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
        return $this->belongsTo('User::class');
    }
}
