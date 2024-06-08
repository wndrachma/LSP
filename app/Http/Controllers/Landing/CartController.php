<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customers');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::with('product')->where('customer_id', auth()->id())->get();
        return view('landingpage.cart', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda perlu login terlebih dahulu.');
        }

        $quantity = $request->input('quantity', 1);
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('shop')->with('error', 'Product not found.');
        }

        $cart = Cart::where('customer_id', Auth::id())->where('product_id', $id)->first();

        if ($cart) {
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            Cart::create([
                'customer_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
        }
        return redirect()->route('landingpage.cart')->with('success', 'Product added to cart!');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request)
    {
        $cart = Cart::where('customer_id', Auth::id())->where('product_id', $request->id)->first();

        if ($cart && $request->quantity) {
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->route('landingpage.cart')->with('success', 'Cart updated successfully');
        }
        return redirect()->route('landingpage.cart')->with('error', 'Invalid request');
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
   

    /**
     * Remove the specified resource from storage.
     */
    public function remove($id)
{
    $cartItem = Cart::find($id);

    if ($cartItem) {
        $cartItem->delete();
        return redirect()->route('landingpage.cart')->with('success', 'Item removed successfully');
    }

    return redirect()->route('landingpage.cart')->with('error', 'Item not found');
}
//     public function destroy(Request $request, $id)
// {
//     $cartItem = Cart::find($id);

//     if (!$cartItem) {
//         return Redirect::route('landingpage.cart')->with('error', 'Item not found');
//     }

//     // Pastikan item yang dihapus dimiliki oleh pengguna yang sedang login
//     if ($cartItem->customer_id != auth()->id()) {
//         return Redirect::route('landingpage.cart')->with('error', 'Unauthorized access');
//     }

//     $cartItem->delete();

//     return Redirect::route('landingpage.cart')->with('success', 'Item removed successfully');
// }
}

