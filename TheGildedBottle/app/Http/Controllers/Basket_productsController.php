<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Basket_productsController extends Controller
{
    public function store(Request $request, $id){

        $input = $request->all();

        $cvs = Cvs::find($id);
        $cvs->name = $input['name'];
        $cvs->keyprogramming = $input['keyprogramming'];
        $cvs->profile = $input['profile'];
        $cvs->education = $input['education'];
        $cvs->URLlinks = $input['URLlinks'];

        $cvs->save();

        
        return redirect('/home');


    }
    

}
