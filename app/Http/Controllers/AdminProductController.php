<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.add-product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name:en' => 'required',
            'name:ru' => 'required',
            'description:en' => 'required',
            'description:ru' => 'required',
            'category' => 'required'
        ]);

        foreach ($request->file('images') as $image) {
            $name = $image->getClientOriginalName();
            $image->move(public_path() . '/img/', $name);
            $images[] = $name;
        }

        $data = [
            'images_path' => json_encode($images),
            'category_id' => $request->category,
            'en' => [
                'name' => $request->input('name:en'),
                'slug' => Str::slug($request->input('name:en'), '-'),
                'description' => $request->input('description:en')
            ],
            'ru' => [
                'name' => $request->input('name:ru'),
                'slug' => Str::slug($request->input('name:ru'), '-'),
                'description' => $request->input('description:ru')
            ]
        ];
        Product::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
