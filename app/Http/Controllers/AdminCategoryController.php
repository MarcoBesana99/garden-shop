<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-category');
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
        ]);

        $data = [
            'en' => [
                'name' => $request->input('name:en'),
                'slug' => Str::slug($request->input('name:en'),'-'),
            ],
            'ru' => [
                'name' => $request->input('name:ru'),
                'slug' => Str::slug($request->input('name:ru'),'-'),
            ]
        ];
        Category::create($data);
        return redirect()->back()->with('success','Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.edit-category', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name:en' => 'required',
            'name:ru' => 'required',
        ]);

        $data = [
            'en' => [
                'name' => $request->input('name:en'),
                'slug' => Str::slug($request->input('name:en'),'-'),
            ],
            'ru' => [
                'name' => $request->input('name:ru'),
                'slug' => Str::slug($request->input('name:ru'),'-'),
            ]
        ];
        $category->update($data);
        return redirect()->back()->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }
}
