<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['name_en','name_ru','name_uz','desc_en','desc_ru','desc_uz','image','category_id'];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}