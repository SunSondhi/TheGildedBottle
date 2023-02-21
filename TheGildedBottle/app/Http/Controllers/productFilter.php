<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productFilter extends Controller
{
    public function productFiltered(Request $request, $filter)
    {
        if (strpos($filter, '-') !== false) {
            list($minPrice, $maxPrice) = explode('-', $filter);

            $products = Product::query()->whereBetween('price', [$minPrice, $maxPrice])->get();
        } else {
            $products = Product::query()->where('productCat', $filter)->get();
        }
        return view('products', ['products' => $products,]);
    }
}
