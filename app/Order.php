<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'shippment', 'cart', 'status', 'deliveredTime', 'notify'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
