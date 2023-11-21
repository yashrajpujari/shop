<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_address extends Model
{      protected $table = 'order_addressess';
    use HasFactory;
    protected $fillable=[
            'order_id',
            'user_id',
            'name',
            'email',
            'phone',
            'address',
            'address_2',
            'city',
            'state',
            'country',
            'pincode',
            'address_type',
    ];
}
