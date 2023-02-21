<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function productList(Request $request)
    {
        $products = Product::all();


        

        return view('products', compact('products'));

    }

    public function filterByCategory($category)
    {
        $products = Product::where('productCat', $category)->get();

        return view('products', compact('products'));
    }


    public function filterByType($type)
    {
        $products = Product::where('type', $type)->get();
        return view('products', compact('products'));
    }

    public function filterByPrice(Request $request)
    {
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $products = Product::where('price', [$minPrice, $maxPrice])->get();

        return view('products', compact('products'));
    }


}
