<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deliverie;
use App\Models\Order;

class DeliverieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('deliveries.index', [
            'pengirim' => Deliverie::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deliveries.create', [
            'orders' => Order::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pengiriman(Request $request)
    {
        $data = $request->validate([
            'order_id' => ['required'],
            'shipping_date' => ['required'],
            'tracking_code' => ['required'],
            'status' => ['required']
        ]);
        Deliverie::create($data);
        return redirect('/deliveries')->with('success', 'New Deliverie Data Created Successfully');
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
        $delivery = Deliverie::find($id);
        if (!$delivery) return redirect()->route('deliveries.edit');
        return view('deliveries.edit', [
            'delivery' => $delivery,
            'orders' => Order::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $delivery = Deliverie::find($id);
        $delivery->order_id = $request->order_id;
        $delivery->shipping_date = $request->shipping_date;
        $delivery->tracking_code = $request->tracking_code;
        $delivery->status = $request->status;
        $delivery->save();
        return redirect('/deliveries')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusDlvry(string $id)
    {
        $dlvry = Deliverie::find($id);
        $dlvry->delete();
        return redirect('/deliveries')->with('success', 'Profile successfully deleted!');
    }
}
