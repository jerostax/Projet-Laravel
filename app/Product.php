<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'url_image', 'title', 'description', 'code', 'price', 'status', 'categorie_id', 'size', 'reference'
    ];
    public function scopePublished($query) {
        return $query->where('status', 'Publié');
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
