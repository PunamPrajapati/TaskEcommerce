<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shippment extends Model
{
    protected $fillable = [
        'user_id', 'name', 'address', 'phone', 'city'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
