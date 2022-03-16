<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
    ];

    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function Item(){
        return $this->hasMany('App\Models\Item');
    }
}
