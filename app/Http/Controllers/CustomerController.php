<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index', [
            'pelanggan' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pelanggan(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'phone' => ['required'],
            'address1' => ['required'],
            'address2' => ['required'],
            'address3' => ['required']
        ]);
        Customer::create($data);
        return redirect('/customer')->with('success', 'New Customer Data Created Successfully');
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
        $customer = Customer::find($id);
        if (!$customer) return redirect()->route('customer.edit');
        return view('customer.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        if ($request->password) $customer->password = bcrypt($request->password);
        $customer->phone = $request->phone;
        $customer->address1 = $request->address1;
        $customer->address2 = $request->address2;
        $customer->address3 = $request->address3;
        $customer->save();
        return redirect('/customer')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusCstmr(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customer')->with('success', 'Profile successfully deleted!');
    }
}
