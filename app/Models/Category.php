<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name_uz','name_ru','name_en','image','parent_id'];

    public function dishes(){
        return $this->hasMany(Dish::class,'category_id','id');
    }

}
