<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopContent extends Model
{
    protected $fillable = [
        'id', 'image', 'main_content', 'mini_content', 'content_button', 'url_button'
    ];
}
