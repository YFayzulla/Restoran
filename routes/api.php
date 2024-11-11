<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categories/{category}/subcategories', function ($categoryId) {
    $category = Category::findOrFail($categoryId);
    return response()->json([
        'subcategories' => $category->subcategories
    ]);
});
