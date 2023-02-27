<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Baskets;
use App\Models\Basket_product;
use Illuminate\Support\Facades\DB;
class productController extends Controller
{
    public function productList(Request $request)
    {
        $products = Product::all();


        

        return view('products', compact('products'));

    }

    public function filterByCategory($category)
    {

        $products = Product::query()->where('productCat', $category)->get();
        
        return view('products', compact('products'));
    }

    
    public function filterByPrice(Request $request)
    {    
        $minPrice = $request->input('min_price', 0); 
        $maxPrice = $request->input('max_price', 50);
        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();
        return view('products', compact('products'));
    }
    
    function product_details($id){
        $data = Product::find($id);
        return view('Products_details',['product' => $data]);
    }

    function add_to_basket(){

        $basket = Baskets::firstOrNew(['user_id' => (Auth::id())]
        );
        $basket -> user_id = Auth::id();
        $basket -> save();
        $product = New Basket_product();
        $product->id = request('id');
        $product->name = request('name');
        $product->price = request('price');
        $product->quantity = request('quantity');
        $product->baskets_id = $basket->id;
        $product->image = request('image');
        $product->save(); 
        return redirect()->route('Basket')->with('message', 'product added to basket');
    }

    public function addNewProducts(Request $r)
    {
        $newProduct = new product;
        $newProduct->name = $r->name;
        $newProduct->price = $r->price;
        $newProduct->description = $r->description;
        $newProduct->image = $r->image;
        $newProduct->quantity = $r->quantity;
        $newProduct->type = $r->type;
        $newProduct->productCat = $r->productCat;
        $newProduct->flavour = $r->flavour;
        $newProduct->percentage = $r->percentage;
        $newProduct->save();
        return redirect()->route('admin.adminhome');
    }


}
