<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'url_image', 'title', 'description', 'code', 'price', 'status', 'categorie_id', 'size'
    ];
    
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
