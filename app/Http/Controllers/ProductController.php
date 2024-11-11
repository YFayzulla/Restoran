<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\FileSaveService;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function __construct(
        protected FileSaveService $FileSaveService,
    )
    {

    }

    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::all(),
            'categories' => Category::query()->whereNull('sub_category')->get(),
            'subcategories' => Category::query()->whereNotNull('sub_category')->get(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        if ($request->hasFile('photo')) {
            $file = $this->FileSaveService->upload($request->file('photo'));
        }

        Product::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->subcategory_id ?? $request->category_id,
            'photo' => $file
        ]);

        return redirect()->back()->with('success', 'Mahsulot qo`shildi');


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('photo')) {
            if ($product->photo && Storage::exists( $product->photo)) {
                Storage::delete( $product->photo);
            }
            $file = $this->FileSaveService->upload($request->file('photo'));
            $product->photo = $file;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->subcategory_id ??  $request->category_id;

        $product->save();

        return redirect()->back()->with('success', 'Mahsulot yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the associated photo file if it exists
        if ($product->photo && Storage::exists($product->photo)) {
            Storage::delete($product->photo);
        }

        // Delete the product from the database
        $product->delete();

        return redirect()->back()->with('success', 'Mahsulot muofaqiyatliy o`chirildi');
    }
}
