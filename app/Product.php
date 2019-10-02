<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'category_id', 'price', 'available', 'description', 'image', 'division_id', 'discount'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
}
