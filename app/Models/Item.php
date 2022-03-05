<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeno',
        'name',
        'photo',
        'price',
        'discount',
        'description',
        'brand_id',
        'subcategory_id',
    ];
}
