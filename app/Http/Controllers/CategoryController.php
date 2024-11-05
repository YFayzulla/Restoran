<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreCategoryRequest $request)
    {

        if ($request->status == 'on')
            Category::query()->create($request->all());
        else
            Category::query()->create(['name' => $request->name]);

        return redirect()->back()->with('message', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($request->status == 'on') {
            $category->update($request->all());
        } else {
            $category->update([
                'name' => $category->name,
                'sub_category' => null
            ]);
        }
        return redirect()->back()->with('message', 'Kategoriya muofaqiyatliy yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message', 'Kategoriya muofaqiyatliy o`chirildi');
    }
}
