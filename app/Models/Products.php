<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id',
        'name',
        'slug',
        'price',
        'price_sale',
        'short_content',
        'description',
        'image',
        'feature',
        'active',
        'specification',
        'min_range',
        'max_range'
    ];
}
