<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','country','first_name','last_name','company','city','address_1','address_2','save_as','is_default'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
