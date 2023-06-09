<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model3d extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'price', 'file_format', 'file', 'creator_id', 'description'];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }
}
