<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckoutVwController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $customer_id = Auth::guard('customers')->id();

        $cartItems = Cart::where('customer_id', $customer_id)
            ->with('product', 'product.discounts')
            ->get()
            ->map(function ($item) {
                $product = $item->product;
                $discountPercentage = $product->discount->percentage ?? 0;
                $discountedPrice = $product->price;

                if ($discountPercentage > 0) {
                    $discountedPrice = $product->price - ($product->price * $discountPercentage / 100);
                }

                $item->discounted_price = $discountedPrice;
                $item->subtotal = $discountedPrice * $item->quantity;

                return $item;
            });

        return view('landingpage.checkoutvw', compact('cartItems'));
    }

    /**
         * Show the form for creating a new resource.
         */

    public function checkoutProcess(Request $request)
    {
        $selectedItems = $request->input('select_item', []);
        $cartItems = Cart::whereIn('id', $selectedItems)->with(['product', 'product.discounts'])->get();

        // Calculate discounted price and subtotal
        foreach ($cartItems as $item) {
            $product = $item->product;
            $discountPercentage = $product->discount->percentage ?? 0;
            $discountedPrice = $product->price;

            if ($discountPercentage > 0) {
                $discountedPrice = $product->price - ($product->price * $discountPercentage / 100);
            }
            $item->discounted_price = $discountedPrice;
            $item->subtotal = $discountedPrice * $item->quantity;
        }

        return view('landingpage.checkoutvw', compact('cartItems'));
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
        $customer_id = Auth::guard('customers')->id();
        $orderTime = now();

        // Membuat order baru
        $order = Order::create([
            'customer_id' => $customer_id,
            'order_time' => $orderTime,
            'total_amount' => $request->input('total_amount'),
            'status' => 'Proses',
        ]);

        // Mengambil item di keranjang belanja
        $cartItems = DB::table('')
            ->join('products', '.product_id', '=', 'products.id')
            ->leftJoin('discounts', 'products.id', '=', 'discounts.product_id')
            ->where('.customer_id', $customer_id)
            ->select(
                '.*',
                'products.product_name',
                'products.price',
                'products.image1_url',
                'discounts.percentage as discount_percentage'
            )
            ->get()
            ->map(function ($item) {
                $item->discounted_price = $item->discount_percentage ? 
                    $item->price - ($item->price * $item->discount_percentage / 100) : 
                    $item->price;
                $item->subtotal = $item->discounted_price * $item->quantity;
                return $item;
            });

        foreach ($cartItems as $item) {
            // Cek apakah item dengan product_id yang sama sudah ada di order_details
            $existingOrderDetail = Order_details::where('order_id', $order->id)
                ->where('product_id', $item->product_id)
                ->first();

            if ($existingOrderDetail) {
                // Jika sudah ada, update quantity dan subtotal
                $existingOrderDetail->quantity += $item->quantity;
                $existingOrderDetail->subtotal += $item->subtotal;
                $existingOrderDetail->save();
            } else {
                // Jika belum ada, buat item baru di order_details
                Order_details::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->subtotal,
                ]);
            }
        }

        // Mengarahkan kembali ke halaman checkout dengan informasi order
        return redirect()->route('landingpage.checkoutvw')->with([
            'order_id' => $order->id,
        ]);
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