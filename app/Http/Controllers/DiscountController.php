<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\DiscountCategories;
use App\Models\Product;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('discount.index', [
            'diskon' => Discount::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discount.create', [
            'category_name' => DiscountCategories::all(),
            'product_name' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function discount(Request $request)
    {
        $data = $request->validate([
            'category_discount_id' => ['required'],
            'product_id' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'percentage' => ['required']
        ]);
        Discount::create($data);
        return redirect('/discount')->with('success', 'New Discount Data Created Successfully');
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
        $discount = Discount::find($id);
        if (!$discount) return redirect()->route('discount.edit');
        return view('discount.edit', [
            'discount' => $discount,
            'category_name' => DiscountCategories::all(),
            'product_name' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $discount = Discount::find($id);
        $discount->category_discount_id = $request->category_discount_id;
        $discount->product_id = $request->product_id;
        $discount->start_date = $request->start_date;
        $discount->end_date = $request->end_date;
        $discount->percentage = $request->percentage;
        $discount->save();
        return redirect('/discount')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusDscn(string $id)
    {
        $discount = Discount::find($id);
        $discount->delete();
        return redirect('/discount')->with('success', 'Profile successfully deleted!');
    }
}
