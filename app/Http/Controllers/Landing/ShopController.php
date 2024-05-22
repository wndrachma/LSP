<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categori = ProductCategories::all();
        $produk = Product::all();
        // dd($categori);
        return view('landingpage.shop', compact('produk', 'categori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function produk_detail($id)
    {
        $produkDetail = Product::where('id', $id)->get();
        return view('landingpage.produk-detail', compact('produkDetail'));
    }

    public function filterByCategory($product_category_id)
    {
        // Ambil data kategori berdasarkan ID
        $category = ProductCategories::findOrFail($product_category_id);
        
        // Ambil produk yang terkait dengan kategori yang dipilih
        $produk = Product::where('product_category_id', $product_category_id)->get();
        
        // Ambil semua kategori (untuk menampilkan menu kategori di sidebar atau header)
        $categori = ProductCategories::all();

        // Kembalikan view produk dengan produk yang disaring dan semua kategori
        return view('landingpage.shop', compact('produk', 'categori'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
