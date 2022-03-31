<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
