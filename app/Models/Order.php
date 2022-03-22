<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderdate',
        'user_id',
        'total',
        'status',
        'orderno',
        'location',
    ];
    public function Items()
    {
        return $this->belongsToMany('App\Models\Item', 'orderdetails')
            ->withPivot('qty')
            ->withTimestamps();
    }
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
