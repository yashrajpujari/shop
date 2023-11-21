<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Page extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia; 
    protected $fillable=[
        'parentpage_id',
        'name',
        'status',
        'show_in_menu',
        'show_in_footer',
        'url_key',
        'Description',
        'meta_teg',
        'meta_title',
        'meta_description',
    ];
}
