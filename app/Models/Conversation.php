<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['first_user', 'second_user'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }
}

