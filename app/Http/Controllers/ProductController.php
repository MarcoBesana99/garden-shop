<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($lang, $slug, $productSlug) {
        $category = Category::whereTranslation('slug', $slug)->select('id')->first();
        $param = Category::where('id', $category->id)->first();
        $product = Product::where('category_id', $category->id)->first();
        $ruParam = ['lang' => 'ru', 'slug' => $param->translate('ru')->slug, 'productSlug' => $product->translate('ru')->slug];
        $enParam = ['lang' => 'en', 'slug' => $param->translate('en')->slug, 'productSlug' => $product->translate('en')->slug];
        return view('product', compact('product', 'ruParam', 'enParam','slug'));
    }
}
