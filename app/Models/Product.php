<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
class Product extends Model  implements HasMedia
{
    use HasFactory , InteractsWithMedia; 

    protected $fillable=[
        'Name',
        'Status',
        'Is_Featured',
        'Sku',
        'Qty',
        'Stock_Status', 
        'Weight',
        'Price',
        'Short_Description',
        'Description', 
        'Meta_Tag',
        'Meta_title',
        'Meta_Description',
        'url_key',
        'Related_Products',
        'Special_price_from',
        'Special_price_to',
        'Special_Price',
    ];


    public function categories() {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

   

}
