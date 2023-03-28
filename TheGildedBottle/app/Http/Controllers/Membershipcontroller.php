<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Baskets;
use App\Models\Purchases;
use App\Models\Product;

use App\Models\Basket_product;
use Illuminate\Support\Facades\DB;

class Membershipcontroller extends Controller
{
    public function subscribe()
    {
        $user = Auth::user();

        $user->role = 3;
        $user->save();
        return redirect()->route('Congratulations')->with('message', "items bought");
    }

    public function cancellation()
    {
        $user = Auth::user();

        $user->role = 0;
        $user->save();
        return redirect()->route('Cancellation')->with('message', "subscription cancelled");
    }
}
