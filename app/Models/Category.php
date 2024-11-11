<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'sub_category'];

    // Define a relationship to get the main category of this subcategory
    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'sub_category');
    }

    // Define a relationship to get all subcategories of this main category
    public function subCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'sub_category');
    }
}
