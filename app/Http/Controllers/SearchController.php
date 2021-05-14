<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function filterByCategory(Request $request)
    {
        $category = Category::whereTranslation('id', $request->category)->first();
        $slug = $category->slug;
        return redirect()->route('show.filtered.products', ['lang' => app()->getLocale(), 'slug' => $slug]);
    }

    public function showFilteredProducts($lang, $slug)
    {
        $category = Category::whereTranslation('slug', $slug)->select('id')->first();
        $param = Category::where('id', $category->id)->first();
        $ruParam = ['lang' => 'ru', 'slug' => $param->translate('ru')->slug];
        $enParam = ['lang' => 'en', 'slug' => $param->translate('en')->slug];
        $products = Product::where('category_id', $category->id)->get();
        return view('filtered-products', compact('products', 'ruParam', 'enParam'));
    }
}
