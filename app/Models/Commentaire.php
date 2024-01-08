<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenucomments',"user_id","publication_id",
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
    
    public function reactions(){
        return $this->hasMany('App\Reaction');
    }
}
