<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function index()
    {
        $customer_id = Auth::guard('customers')->id();
        $totalQuantity = DB::table('carts')
            ->where('customer_id', $customer_id)
            ->sum('quantity');
        $product_reviews = ProductReview::all();
         
        return view('landingpage.review', [
            'customer_id' => Customer::all(),
            'product_name' => Product::all(),
            'product_reviews' => $product_reviews,
            'totalQuantity' => $totalQuantity
        ]); 
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'product_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        // Create a new review
        ProductReview::create([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Review has been successfully submitted!');
    }
}

