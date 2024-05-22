<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orderDetail.index', [
            'orderdetail' => OrderDetail::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orderDetail.create', [
            'product_name' => Product::all(),
            'orders' => Order::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function OD(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required'],
            'order_id' => ['required'],
            'quantity' => ['required'],
            'subtotal' => ['required']
        ]);
        OrderDetail::create($data);
        return redirect('/orderDetail')->with('success', 'New Order Detail Data Created Successfully');
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
        $orderDetail = OrderDetail::find($id);
        if (!$orderDetail) return redirect()->route('orderDetail.edit');
        return view('orderDetail.edit', [
            'orderDetail' => $orderDetail,
            'product' => Product::all(),
            'orders' => Order::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderDetail = OrderDetail::find($id);
        $orderDetail->product_id = $request->product_id;
        $orderDetail->order_id = $request->order_id;
        $orderDetail->quantity = $request->quantity;
        $orderDetail->subtotal = $request->subtotal;
        $orderDetail->save();
        return redirect('/orderDetail')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusOD(string $id)
    {
        $orderDetail = OrderDetail::find($id);
        $orderDetail->delete();
        return redirect('/orderDetail')->with('success', 'Profile successfully deleted!');
    }
}
