<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'movieId','name','price','date','description','image'
    ];

    public function movies(){
        $this->belongsTo(Movie::class,'movieId');
    }
}
