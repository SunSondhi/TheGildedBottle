<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    public function list()
    {
        if (Auth::check()) {
            $user = Auth::id();

            //write a query to filter
            $purchases = DB::table('purchases')->where('user_id', $user)->orWhere('in_progress', False)->get();

            if ($purchases->isEmpty()) {
                return redirect()->back()->with('message', "No Data Found");
            } else {
                return view('Purchases', compact('purchases'));
            }
        } else {
            return redirect()->back()->with('message', "Please log in to view your purchases");
        }
    }
}
