<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'model3d_id', 'price', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function model3ds()
    {
        return $this->belongsToMany(Model3d::class);
    }
}
