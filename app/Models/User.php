<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    /**
     * Representa a ligação entre o Model User e Model Profile e
     * indica que User tem um Profile
     * e lá no profile é o inverso, Profile pertence a um User
     * hasOne - inverso belongsTo
     * @return Profile
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
        
        //se o nome da coluna não fosse user_id na tabela profiles
        //return $this->hasOne(Profile::class, 'usuario_id');
    }


    public function events()
    {
        return $this->hasMany(Event::class, 'owner_id'); //informado o segundo parametro pq o nome do dono do evento na tabela users 
                                                        //é diferente de user_id
    }


} //endclass
