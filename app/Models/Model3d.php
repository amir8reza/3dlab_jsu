<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model3d extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'price', 'file_format', 'file', 'creator_id', 'description', 'is_deleted'];

    public function user(){

        return $this->belongsTo(User::class, 'creator_id');

    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images(){
        return $this->hasOne(Image::class, 'model_id');
    }
    public function sales()
    {
        return $this->hasMany(Sale::class, 'model3d_id');
    }
}
