<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Baskets;
use App\Models\Purchases;
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
            $product = new Purchases();
            $product->name = $each->name;
            $product->price = $each->price;
            $product->image = $each->image;
            $product->user = Auth::id();
            $product->save();
            $each->delete();
        });
    }

    function product_delete($id)
    {
        $data = Basket_product::find($id);
        $data . delete();
    }

    function buy($id)
    {
        $data = Basket_product::find($id);
        $data . delete();
    }

    function updateAmount($id)
    {
        $data = Basket_product::find($id);
        $data->price = request('price');
        $data . save();
    }
}
