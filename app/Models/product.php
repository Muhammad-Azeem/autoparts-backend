<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','images','sub_category_id','vehicle_id','description','discounted_price','vehicle_fitment','check_fitment','other_name','part_number','replaced_by','status','available_stock','wholesale_price','minimum_quantity'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function get_products(){
        return $this->hasMany(productImage::class,'product_id', 'id');
    }
    public function get_sub_category(){
        return $this->hasMany(subCategory::class,'category_id', 'id');
    }
    public function get_vehicle_id(){
        return $this->hasMany(vehicle::class,'vehicle_id', 'id');
    }
}
