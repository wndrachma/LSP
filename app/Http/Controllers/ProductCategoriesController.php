<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('productCategories.index', [
            'product' => ProductCategories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function productC(Request $request)
    {
        $data = $request->validate([
            'category_name' => ['required']
        ]);
        ProductCategories::create($data);
        return redirect('/productCategories')->with('success', 'New Product Category Data Created Successfully');
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
        $productCategories = ProductCategories::find($id);
        if (!$productCategories) return redirect()->route('productCategories.edit');
        return view('productCategories.edit', [
            'productCategories' => $productCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $productCategories = ProductCategories::find($id);
        $productCategories->category_name = $request->category_name;
        $productCategories->save();
        return redirect('/productCategories')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusPC(string $id)
    {
        $productCategories = ProductCategories::find($id);
        $productCategories->delete();
        return redirect('/productCategories')->with('success', 'Profile successfully deleted!');
    }
}
