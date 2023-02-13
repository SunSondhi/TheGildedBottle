<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function productList(Request $request)
    {
        $products = Product::all();

        $result  = Product::filter($request)->get();

        

        return view('products', compact('products','result'));

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

    public function filterByPrice($price)
    {
        $priceRange = explode("-", $price);

        $products = Product::whereBetween('price', [$priceRange[0], $priceRange[1]])->get();

        return view('products', compact('products'));
    }


}
