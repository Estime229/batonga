<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'contenuposts',
        'user_id',
        'urlphoto',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function jaime(){
        return $this->belongsToMany('App\User','jaime','publication_id','user_id')
        ->withTimestamps();
    }


    
}
