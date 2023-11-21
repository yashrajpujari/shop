<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'Is_variant',
        'name_key',
    ];


    function attributevalues(){
        return $this->hasMany(Attributevalue::class);
    }
}
