<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'model3d_id', 'comment_text', 'rate', 'is_active'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
