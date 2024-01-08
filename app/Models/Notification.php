<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'typenotif',
        
    ];

    public function destinataire(){
        return $this->belongsTo('App\User', 'user_id1');
    }

    public function declencheur(){
        return $this->belongsTo('App\User', 'user_id2');
    }


}
