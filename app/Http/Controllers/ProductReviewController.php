<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\Customer;
use App\Models\Product;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('productReview.index', [
            'review' => ProductReview::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productReview.create', [
            'customer' => Customer::all(), 
            'product_name' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function rating(Request $request)
    {
        $data = $request->validate([
            'customer_id' => ['required'],
            'product_id' => ['required'],
            'rating' => ['required'],
            'comment' => ['required']
        ]);
        ProductReview::create($data);
        return redirect('/productReview')->with('success', 'New Review Data Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productReview = ProductReview::find($id);
        if (!$productReview) return redirect()->route('productReview.edit');
        return view('productReview.edit', [
            'productReview' => $productReview,
            'customer' => Customer::all(),
            'product_name' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $productReview = ProductReview::find($id);
        $productReview->customer_id = $request->customer_id;
        $productReview->product_id = $request->product_id;
        $productReview->rating = $request->rating;
        $productReview->comment = $request->comment;
        $productReview->save();
        return redirect('/productReview')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusRvw(string $id)
    {
        $productReview = ProductReview::find($id);
        $productReview->delete();
        return redirect('/productreview')->with('success', 'Profile successfully deleted!');
    }
}
