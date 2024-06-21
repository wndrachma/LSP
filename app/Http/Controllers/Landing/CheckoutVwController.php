<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Payment;
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
            'order_date' => $orderTime,
            'total_amount' => $request->input('total_amount'),
            'status' => 'Proses',
        ]);

        //Mengambil item yang dipilih dari keranjang belanja
        $selectedItems = $request->input('selected_items', []);
        if (empty($selectedItems)) {
            return redirect()->back()->with('error', 'No items selected for checkout.');
        }

        // Mengambil item di keranjang belanja
        $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->leftJoin('discounts', 'products.id', '=', 'discounts.product_id')
            ->where('carts.customer_id', $customer_id)
            ->whereIn('carts.id', $selectedItems)
            ->select(
                'carts.*',
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
            $existingOrderDetail = OrderDetail::where('order_id', $order->id)
                ->where('product_id', $item->product_id)
                ->first();

            if ($existingOrderDetail) {
                // Jika sudah ada, update quantity dan subtotal
                $existingOrderDetail->quantity += $item->quantity;
                $existingOrderDetail->subtotal += $item->subtotal;
                $existingOrderDetail->save();
            } else {
                // Jika belum ada, buat item baru di order_details
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->subtotal,
                ]);
            }
        }

        Payment::create([
            'order_id' => $order->id,
            'payment_date' => $request->input('payment_date'),
            'payment_method' => $request->input('payment_method'),
            'amount' => $order->total_amount,
        ]);

        //menghapus item yang dipilih dari keranjang
        Cart::where('customer_id', $customer_id)
            ->whereIn('id', $selectedItems)
            ->delete();
        
            $request->session()->flash('order_placed', true);

        // Mengarahkan kembali ke halaman checkout dengan informasi order
        return redirect()->route('landingpage.checkoutvw')->with('success', 'Order and Payment');
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