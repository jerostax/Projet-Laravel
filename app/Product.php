<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'url_image'
    ];
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
