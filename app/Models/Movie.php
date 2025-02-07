<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name'
    ];

    public function genres(){
        $this->hasMany(Genre::class,'movieId');
    }
}
