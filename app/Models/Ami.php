<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ami extends Model
{
    use HasFactory;
    protected $fillable = [
        'statutdemande',
      
    ];

    public function demandeur(){
        return $this->belongsTo('App\User', 'user_id1');
    }

    public function destinateur(){
        return $this->belongsTo('App\User', 'user_id2');
    }
}
