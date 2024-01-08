<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Message;
use App\Commentaire;
use App\Publication;
use App\Notification;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'prename',
        'birthday',
        'url_profil',
        'skils',
        'notes',
        'location',

    ];

public function publications(){
    return $this->hasMany('Publication');
}

public function commentaires()
{
    return $this->hasMany(Commentaire::class);
}

public function amis(){
    return $this->belongsToMany('User','amis','user_id1','user_id2')
    ->withPivot('statutdemande')
    ->withTimestamps();

}


public function jaimes(){
    return $this->belongsToMany('Publication','jaimes','user_id','publication_id')
    ->withTimestamps();
}

public function notifications(){
    return $this->hasMany('Notification','user_id');
}

public function messagesEnvoyes(){
    return $this->hasMany('Message','user_id1');
}

public function messagesRecus(){
    return $this->hasMany('Message','user_id2');
}

// public function messages() {
//     return $this->hasMany(Message::class);
// }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
