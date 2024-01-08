<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenumessage',
        'user_id1',
        'user_id2',

    
    ];

    public function envoyeur(){
        return $this->belongsTo(User::class, 'user_id1');
    }

    public function destinateur(){
        return $this->belongsTo(User::class, 'user_id2');
    }

    // public function sender() {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // public function receiver() {
    //     return $this->belongsTo(User::class, 'receiver_id');
    // }

}
