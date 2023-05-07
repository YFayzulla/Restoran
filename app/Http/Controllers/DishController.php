<?php

namespace App\Http\Controllers;

//use App\Models\Category;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::with('category')->take(100)->get();
        return view('dishes.index',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {

        $categories=Category::all();
        return view('dishes.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        @dd($request);

        $request->validate([
            'name_uz'=>'required|string',
            'name_ru'=>'required|string',
            'name_en'=>'required|string',
            'desc_uz'=>'required|string',
            'desc_ru'=>'required|string',
            'desc_en'=>'required|string',
            'category_id'=>'required',
            'image'=>'required'
        ]);
        $data= new Dish();
//        dd($request->all());
        if($request->hasfile('image')){
            dd('salopm');
            $file= $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('asset'),$filename);
            $data['name_uz']=$request->name_uz;
            $data['name_ru']=$request->name_ru;
            $data['name_en']=$request->name_en;
            $data['desc_uz']=$request->desc_uz;
            $data['desc_ru']=$request->desc_ru;
            $data['desc_en']=$request->desc_en;
            $data['category_id']=$request->category_id;
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('dish.index')->with('success','muofaqiyatliy qoshildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $categories=Category::all();
        return view('dishes.edit',['dishes'=>$dish ,'categories'=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name_uz'=>'required|string',
            'name_ru'=>'required|string',
            'name_en'=>'required|string',
            'desc_uz'=>'required|string',
            'desc_ru'=>'required|string',
            'desc_en'=>'required|string',
            'category_id'=>'required',
            'thumbnail'=>'required'
        ]);
//        @dd($request);

        $user= auth()->user()->name;

        if($request->hasfile('thumbnail')){
            $file= $request->file('thumbnail');
            $filename = date('YmdHi').$file->getClientOriginalExtension();
            $file->move(public_path('asset'),$filename);
            $dish['name_uz']=$request->name_uz;
            $dish['name_ru']=$request->name_ru;
            $dish['name_en']=$request->name_en;
            $dish['desc_uz']=$request->desc_uz;
            $dish['desc_ru']=$request->desc_ru;
            $dish['desc_en']=$request->desc_en;
            $dish['category_id']=$request->category_id;
            $dish['image']=$filename;
        }

        $dish->update();
        return redirect()->route('dish.index')->with('success','muofaqiyaatli saqlandi');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->back()->with('success','muofaqiyatliy ochdi');
    }
}
