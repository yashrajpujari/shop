<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote_item extends Model
{
    use HasFactory;

    protected $fillable=[
        'quote_id',
            'product_id',
            'name',
            'sku',
            'price',
            'qty',
            'row_total',
            'custom_option',
    ];
      public function quote(){
        return  $this-> belongsto(Quote::class);
    }
}
