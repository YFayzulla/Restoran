<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = ['name', 'sub_category'];


    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'sub_category'); // Specify the foreign key
    }

}
