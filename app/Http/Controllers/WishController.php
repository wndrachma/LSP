<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('customer_id', Auth::guard('customers')->id())->get();
        return view('wishlist.index', compact('wishlists'));
    }

    public function store(Request $request)
    {
        $wishlist = Wishlist::firstOrCreate(
            ['customer_id' => Auth::guard('customers')->id(), 'product_id' => $request->product_id]
        );

        return redirect()->route('wish.index')->with('success', 'Product added to wishlist');
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::where('customer_id', Auth::guard('customers')->id())->where('id', $id)->first();
        if ($wishlist) {
            $wishlist->delete();
            return redirect()->route('wish.index')->with('success', 'Product removed from wishlist');
        }
        return redirect()->route('wish.index')->with('error', 'Product not found in wishlist');
    }
}
