<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    public function list()
    {


        $user = Auth::id();

        //write a query to filter
        $products = DB::table('purchases')

            ->where('user_id', 'like', '%' . $user . '%')

            ->get();

        if (is_null($products)) {
            return redirect()->back()->with('message', "No Data Found");
        } else {
            return view('Purchases', compact('products'));
        }
    }
}
