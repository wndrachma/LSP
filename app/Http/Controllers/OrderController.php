<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index', [
            'order' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create', [
            'customer' => Customer::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function beli(Request $request)
    {
        $data = $request->validate([
            'customer_id' => ['required'],
            'order_date' => ['required'],
            'total_amount' => ['required'],
            'status' => ['required']
        ]);
        Order::create($data);
        return redirect('/orders')->with('success', 'New Order Data Created Successfully');
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
        $order = Order::find($id);
        if (!$order) return redirect()->route('orders.edit');
        return view('orders.edit', [
            'orders' => $order,
            'customer' => Customer::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orders = Order::find($id);
        $orders->customer_id = $request->customer_id;
        $orders->order_date = $request->order_date;
        $orders->total_amount = $request->total_amount;
        $orders->status = $request->status;
        $orders->save();
        return redirect('/orders')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusOdr(string $id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect('/orders')->with('success', 'Profile successfully deleted!');
    }
}
