<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable=[
        'cart_id',
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'pincode', 
        'subtotal',
        'coupan',
        'coupan_discount',
        'total',
    ];
    
    public function Quoteitem(){
        return  $this->hasMany(Quote_item::class);
    }

}
