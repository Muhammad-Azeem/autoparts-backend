<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','sub_total','shipment_cost','total','status'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function order_items(){
        return $this->hasMany(orderItem::class,'order_id', 'id');
    }
}
