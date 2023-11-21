<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
   protected $fillable=[
             'order_id',
            'product_id',
            'name',
            'price',
            'sku',  
            'qty',  
            'row_total', 
            'custom_option', 

   ];
}
