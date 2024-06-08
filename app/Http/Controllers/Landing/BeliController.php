<?php
namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    // Logika untuk menampilkan halaman checkout
    $selectedItems = $request->input('select_item', []);
    $cartItems = Cart::whereIn('id', $selectedItems)
                     ->where('customer_id', Auth::id())
                     ->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('landingpage.cart')->with('error', 'Tidak ada item yang dipilih untuk checkout');
    }

    return view('landingpage.chekcoutvw', compact('cartItems'));
}

    /**
     * Process the checkout.
     */
    public function process(Request $request)
{
    // Get selected product IDs from the request
    $selectedProducts = $request->input('select_item', []);

    // Ensure $selectedProducts is an array
    $selectedProducts = is_array($selectedProducts) ? $selectedProducts : [];

    // Store selected product IDs in the session
    session(['select_item' => $selectedProducts]);

    // Redirect to the checkout page
    return Redirect::route('landingpage.beli')->with('success', 'Products successfully added to checkout!');

    // // Proses checkout di sini
    // // Misalnya, membuat pesanan baru berdasarkan item yang dipilih
    // $selectedItems = $request->input('select_item', []);
    // $cartItems = Cart::whereIn('id', $selectedItems)->with(['product'])->get();
    // // Logged in User
    // // $user = Auth::user();
    // // $user_id = $user->id;
    // //$customer = customer_id;
    
    // foreach ($cartItems as $item) {
    //     // Dapatkan detail item dari keranjang
    //     // $cartItem = Cart::where('id', $itemId)
    //     //                 ->where('customer_id', Auth::id())
    //     //                 ->first();
        
    //     // Buat pesanan baru dengan detail item yang dipilih
    //     $product = $item->product;
    //     $discountPercentage = $product->discount->percentege ?? 0;
    //     $order->total_amount = 0;
    //     $discountedPrice = $product->price;

    //     if ($discountPercentage > 0) {
    //         $discountPrice = $product->price - ($product->price * $diacountPercentage / 100);
    //     }
    //     $item->discounted_price = $discountedPrice;
    //     $item->subtotal = $discountedPrice * $item->quantity;
        
    }

    // Redirect kembali ke halaman keranjang dengan pesan sukses
    // return view('landingpage.beli', compact('cartItems'));

    /**
     * Show the form for creating a new resource.
     */
    public function showPaymentForm(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        $payments = Payment::all();
        $products = Product::all();

        return view ('landingpage.payment-form', [
            'payments' => $payments,
            'products' => $products
        ]);
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
