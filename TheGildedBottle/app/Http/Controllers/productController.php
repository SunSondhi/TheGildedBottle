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
        return view('Products', compact('products'));
    }

    public function filterByCategory($category)
    {

        $products = Product::query()->where('productCat', $category)->get();
        
        return view('Products', compact('products'));
    }
    // http://localhost/TheGildedBottle/TheGildedBottle/public/products/update/quantity?pid=3&qty=4
    public function updateQuantity(Request $request)
    {
    
        $productID = $request->input('pid'); 
        $chosenQuantity = $request->input('qty');
    
        $availableQuantity = Product::query('products')->where('id', $productID)->select('quantity')->first()->quantity;
        if ($chosenQuantity > $availableQuantity){
            return redirect()->route('Basket');
        }
    
        Basket_product::query('basket_products')->where('id', $productID)->update(['quantity' => $chosenQuantity]);
    
    
        return redirect()->route('Basket')->with('message', 'Successfully Updated Quantity');
    }
    
    public function filterByPrice(Request $request)
    {    
        $minPrice = $request->input('min_price', 0); 
        $maxPrice = $request->input('max_price', 50);
        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();
        return view('Products', compact('products'));
    }
    
    function product_details($id){
        $data = Product::find($id);
        return view('Products_details',['product' => $data]);
    }

    public function product_search(Request $request){
        $search_entry = $request->input('search_entry'); 
        if ($search_entry !=""){
            $products = Product::where('name','LIKE','%'.$search_entry.'%')->get();
        }else{
            $products = Product::all();
        }
        return view('Products', compact('products'));
    }

    function add_to_basket()
    {
        // Check if user is authenticated
        if (Auth::check()) {
            $user_id = Auth::id();
        } else {
            // User is not authenticated, store item in session
            $basket = session()->get('basket', []);

            $item_id = request('id');
            $item_quantity = request('quantity');

            $item_found = false;
            // Check if item already exists in basket
            foreach ($basket as $index => $item) {
                if ($item['id'] === $item_id) {
                    // If item exists, increase quantity and update basket
                    $basket[$index]['quantity'] += $item_quantity;
                    $item_found = true;
                    break;
                }
            }

            if (!$item_found) {
                // If item doesn't exist, add it to basket
                array_push($basket, [
                    'id' => $item_id,
                    'name' => request('name'),
                    'price' => request('price'),
                    'quantity' => $item_quantity,
                    'image' => request('image')
                ]);
            }

            session()->put('basket', $basket);

            return redirect()->route('login')->with('message', 'Please log in to proceed to checkout');
        }

        // User is authenticated, store item in database
        $basket = Baskets::firstOrNew(['user_id' => $user_id]);
        $basket->user_id = $user_id;
        $basket->save();

        $item_id = request('id');
        $item_quantity = request('quantity');

        $existing_item = Basket_product::where('baskets_id', $basket->id)
            ->where('id', $item_id)
            ->first();

        if ($existing_item) {
            // If item exists, increase quantity and update basket
            $existing_item->quantity += $item_quantity;
            $existing_item->save();
        } else {
            // If item doesn't exist, add it to basket
            $product = new Basket_product();
            $product->id = $item_id;
            $product->name = request('name');
            $product->price = request('price');
            $product->quantity = $item_quantity;
            $product->baskets_id = $basket->id;
            $product->image = request('image');
            $product->save();
        }

        return redirect()->route('Basket')->with('message', 'Product added to basket');
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
        $newProduct->stock = $r->stock;
        $newProduct->percentage = $r->percentage;
        $newProduct->save();
        return redirect()->route('admin.adminhome');
    }


}
