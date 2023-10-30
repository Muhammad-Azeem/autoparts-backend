<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function sub_categories(){
        return $this->hasMany(subCategory::class,'category_id', 'id');
    }
}
