<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Category $category){
        if (!isset($category->id)) {
            $category->id=1;
        }
        $dishes = Dish::where('category_id', $category->id)->get();
        $categories=Category::where('parent_id',0)->get();
        return view("restaran.index",compact('categories','dishes'));
    }
}
