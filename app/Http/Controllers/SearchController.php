<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class SearchController extends Controller
{
    public function showFilteredProducts($lang, $slug)
    {
        $category = Category::whereTranslation('slug', $slug)->select('id')->first();
        $categoryName = $category->name;
        $param = Category::where('id', $category->id)->first();
        $ruParam = ['lang' => 'ru', 'slug' => $param->translate('ru')->slug];
        $enParam = ['lang' => 'en', 'slug' => $param->translate('en')->slug];
        $products = Product::where('category_id', $category->id)->get();
        return view('filtered-products', compact('products', 'ruParam', 'enParam','slug','categoryName'));
    }
}
