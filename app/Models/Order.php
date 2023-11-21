<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
       
        'order_increment_id',
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'subtotal',
        'coupan',
        'coupan_discount',
        'shipping_cost',
        'total',
        'payment_method',
        'shipping_method',
    
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
}
