<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
    ];
    public function Subcategory(){
        return $this->hasMany('App\Models\Subcategory');
    }
    public function Items(){
        return $this->hasManyThrough(Item::class,Subcategory::class);
    }
}
