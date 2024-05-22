<?php

namespace App\Http\Controllers;

use App\Models\DiscountCategories;
use Illuminate\Http\Request;

class DiscountCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('discountCategories.index', [
            'discount' => DiscountCategories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discountCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function discountC(Request $request)
    {
        $data = $request->validate([
            'category_name' => ['required']
        ]);
        DiscountCategories::create($data);
        return redirect('/discountCategories')->with('success', 'New Discount Category Data Created Successfully');
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
        $discountCategories = DiscountCategories::find($id);
        if (!$discountCategories) return redirect()->route('discountCategories.edit');
        return view('discountCategories.edit', [
            'discountCategories' => $discountCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $discountCategories = discountCategories::find($id);
        $discountCategories->category_name = $request->category_name;
        $discountCategories->save();
        return redirect('/discountCategories')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusDC(string $id)
    {
        $discountCategories = DiscountCategories::find($id);
        $discountCategories->delete();
        return redirect('/discountCategories')->with('success', 'Profile successfully deleted!');
    }
}
