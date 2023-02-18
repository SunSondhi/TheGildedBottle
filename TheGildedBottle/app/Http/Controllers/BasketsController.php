<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Baskets;
use App\Models\Basket_product;
use Illuminate\Support\Facades\DB;
class BasketsController extends Controller
{
    public function list(){
        $basket = Baskets::firstOrNew(['user_id' => (Auth::id())]);

        $id=$basket->id;
      
       //write a query to filter
       $products = DB::table('basket_products')
      
       ->where('baskets_id', 'like', '%'.$id.'%')
      
       ->get();
      
       if(is_null($products)){
       return redirect()->back()->with('message',"No Data Found");
      
      }else{
            return view('Basket',compact('products'));
      }
    
    }

    public function Buyall(){
        $products = DB::table('basket_products')
      
       ->where('baskets_id', 'like', '%'.$id.'%')
      
       ->get();

       $bought->each(function ($products, $each) {
        $product = New Basket_product();
        $product->name = $each->name;
        $product->price = $each->price;
        $product->image = $each->image;
        $product->user = Auth::id();
        $product->save(); 
    });

    }

    function product_delete($id){
        $data = Basket_product::find($id);
        $data.delete();   }

    function buy($id){
            $data = Basket_product::find($id);
            $data.delete();  }
   
    function updateAmount($id){
            $data = Basket_product::find($id);
            $data -> price = request('price');
            $data.save();

    }



}
    


