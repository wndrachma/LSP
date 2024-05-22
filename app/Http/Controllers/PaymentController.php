<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payment.index', [
            'payments' => Payment::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment.create', [
            'order' => Order::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function bayar(Request $request)
    {
        $data = $request->validate([
            'order_id' => ['required'],
            'payment_date' => ['required'],
            'payment_method' => ['required'],
            'amount' => ['required']
        ]);
        Payment::create($data);
        return redirect('/payment')->with('success', 'New Payment Data Created Successfully');
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
        $payment = Payment::find($id);
        if (!$payment) return redirect()->route('payment.edit');
        return view('payment.edit', [
            'payment' => $payment,
            'order' => Order::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);
        $payment->order_id = $request->order_id;
        $payment->payment_date = $request->payment_date;
        $payment->payment_method = $request->payment_method;
        $payment->amount = $request->amount;
        $payment->save();
        return redirect('/payment')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusPymt(string $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/payment')->with('success', 'Profile successfully deleted!');
    }
}
