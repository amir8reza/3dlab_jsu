<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['conversation','from', 'to', 'text'];


    public function user(){
        return $this->belongsTo(user::class);
    }
    public function conversations(){
        return $this->belongsTo(Conversation::class, 'id');
    }
}
