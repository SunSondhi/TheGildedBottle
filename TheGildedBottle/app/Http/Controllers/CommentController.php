<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use App\Models\Review;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->product_id = $product->id;
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect()->back();
    }

    

}



