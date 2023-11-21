<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;


class Category extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;
    protected $fillable=[
        'parent_category',
        'name',
        'status',
        'show_in_menu',
        'shortDescription',
        'Description',
        'meta_teg',
        'meta_title',
        'meta_description',
        'url_key',
    
    
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

}
