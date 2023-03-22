<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->product_id = $product->id;
        $review->comment = $request->input('comment');
        $review->rating = $request->input('rating');
        $review->save();

        return redirect()->back();
    }

    public function commentList($id)
    {
        // Retrieve comments and reviews for the product
        $comments = Comment::where('product_id', $id)->get('comment');
        $reviews = Review::where('product_id', $id)->get('rating');

        return view('Products_details', compact('comments'));;
    }
   
}
