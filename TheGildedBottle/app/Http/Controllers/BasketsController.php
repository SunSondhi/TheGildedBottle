<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Baskets;
use App\Models\Purchases;
use App\Models\Product;

use App\Models\Basket_product;
use Illuminate\Support\Facades\DB;

class BasketsController extends Controller
{
    public function list()
    {
        $basket = Baskets::firstOrNew(['user_id' => (Auth::id())]);

        $id = $basket->id;

        $user = Auth::id();

        //write a query to filter
        $bs_products = DB::table('basket_products')

            ->where('baskets_id', 'like', '%' . $id . '%')

            ->get();

        if (is_null($bs_products)) {
            return redirect()->back()->with('message', "No Data Found");
        } else {
            return view('Basket', compact('bs_products'));
        }
    }

    public function get_user()
    {
        $user = Auth::id();

        if (is_null($user)) {
            return redirect()->back()->with('message', "log in to view basket");
        } else {
            return view('Basket', compact('user'));
        }
    }

    public function buy_all()
    {
        $basket = Baskets::firstOrNew(['user_id' => (Auth::id())]);

        $id = $basket->id;

        $products = DB::table('basket_products')

        ->where('baskets_id', 'like', '%' . $id . '%')

            ->get();



        $products->each(function ($bought, $each) {
            $in_stock = Product::find($bought->name);
            $current = $in_stock->stock;
            $product = new Purchases();
            $product->name = $bought->name;
            $product->price = $bought->price;
            $product->image = $bought->image;
            $product->quantity = $bought->quantity;
            $product->user_id = Auth::id();
            $product->save();
            $in_stock->stock = $current - $bought->quantity;
            $in_stock->save();
            $data = Basket_product::find($bought->id);
            $data->delete();
        }
    );
    return redirect()->route('Purchases')->with('message', "items bought");
    }

    function remove_btn($id)
    {
        $data = Basket_product::find($id);
        $data->delete();
        return redirect()->route('Basket');
    }

    function buy_btn($id)
    {
        $data = Basket_product::find($id);
        $product = new Purchases();
        $product->name = $data->name;
        $product->price = $data->price;
        $product->image = $data->image;
        $product->quantity = $data->quantity;
        $product->user_id = Auth::id();
        $product->save();
        $data->delete();
        return redirect()->route('Purchases')->with('message', "items bought");
    }

    function updateAmount($id)
    {$products = Basket_product::find($id);
        $products->quantity = request('quantity');
        $products->save();
    }
}
