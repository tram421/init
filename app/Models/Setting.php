<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'hotline',
        'address',
        'phone',
        'zalo',
        'short_description',
        'ship_info',
        'open_at',
        'show_price',
        'sale_all_percent',
        'category_sale',
        'category_sale_percent',
        'image_product_number',
        'delete_image',
        'maintenance',
        'email',
        'password_app',
        'social',
        'email_contact'
    ];
}



