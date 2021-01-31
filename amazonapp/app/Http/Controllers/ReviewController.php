<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Product;
//現在のユーザー情報を取得できるようにする
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
      $review = new Review();
      $product = product::find($id);
      $review->content = $request->input('content');
      $review->product_id = $id;
      $review->user_id = Auth::user()->id;
      $review->save();

      return redirect()->route('products.show', $product);
    }
}
