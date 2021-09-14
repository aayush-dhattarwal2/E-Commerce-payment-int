<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'p_name',
        'p_price',
        'p_description',
        'p_image',
        'p_image_path'
    ];
}
