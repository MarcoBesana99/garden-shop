<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() {
        $categories = Category::all();
        $latestProducts = Product::take(3)->get();
        return view('index', compact('categories','latestProducts'));
    }
}
