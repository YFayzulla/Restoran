<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'name_uz'=>'required|string',
            'name_ru'=>'required|string',
            'name_en'=>'required|string',
            'parent_id'=>'required',
            'image'=>'required'
        ]);
        $data= new Category();
        if($request->hasfile('image')){
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('asset'),$filename);
            $data['name_uz']=$request->name_uz;
            $data['name_ru']=$request->name_ru;
            $data['name_en']=$request->name_en;
            $data['parent_id']=$request->parent_id;
            $data['image']=$filename;
        }

        $data->save();
        return redirect()->route('index')->with('success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category ){

        $request->validate([
            'name_uz'=>'required|string',
            'name_ru'=>'required|string',
            'name_en'=>'required|string',
            'parent_id'=>'required',
            'thumbnail'=>'required'
        ]);
        $user= auth()->user()->name;
        if($request->hasFile('thumbnail')){
            $file= $request->file('thumbnail');
            $filename = date('YmdHi') . $user . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('asset'),$filename);
            $category['name_uz']=$request->name_uz;
            $category['name_ru']=$request->name_ru;
            $category['name_en']=$request->name_en;
            $category['parent_id']=$request->parent_id;
            $category['image']=$filename;
        }
        $category->update($request->all());
        return redirect()->route('index')->with('success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success');
    }
}
