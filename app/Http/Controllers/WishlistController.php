<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Customer;
use App\Models\Product;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wishlist.index', [
            'wish' => Wishlist::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wishlist.create', [
            'customer' => Customer::all(),
            'product_name' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function WishList(Request $request)
    {
        $data = $request->validate([
            'customer_id' => ['required'],
            'product_id' => ['required']
        ]);
        Wishlist::create($data);
        return redirect('/wishlist')->with('success', 'New Wishlist Data Created Successfully');
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
        $wishlist = Wishlist::find($id);
        if (!$wishlist) return redirect()->route('wishlist.edit');
        return view('wishlist.edit', [
            'wishlist' => $wishlist,
            'customer' => Customer::all(),
            'product_name' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->customer_id = $request->customer_id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();
        return redirect('/wishlist')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusWsh(string $id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect('/wishlist')->with('success', 'Profile successfully deleted!');
    }
}
