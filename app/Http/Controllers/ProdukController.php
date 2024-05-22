<?php

namespace App\Http\Controllers;

use App\Models\DiscountCategories;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer_id = Auth::guard('customers')->id();

        $products = Product::all();

        $totalQuantity = DB::table('carts')
        ->where('customer_id', $customer_id)
        ->sum('quantity');

        return view('shop.index', compact('products', 'totalQuantity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $customer_id = Auth::guard('customers')->id();
        $totalQuantity = DB::table('carts')
        ->where('customer_id', $customer_id)
        ->sum('quantity');

        $product = Product::find($id);
        // $discounts = Discounts::find('percentage');
    
        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found.');
        }
        // dd($product); // Tambahkan ini untuk memeriksa data produk
        return view('produk.index', compact('product', 'totalQuantity'));
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
