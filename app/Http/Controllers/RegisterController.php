<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;
use Session;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/register');
    }
    
    public function processRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:8|confirmed',
            'roles' => 'required'       
         ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => ['admin', 'owner'], 
            'active' => 1
        ]);
        

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('login');
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

    public function register_proses(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;
        $customer->address1 = $request->address1;
        $customer->address2 = $request->address2;
        $customer->address3 = $request->address3;
        $customer->save();
        // Customers::create(($request->all()));

        if(Auth::guard('customers')->attempt(['email'=> $request->email, 'password'=> $request->password])){
            return redirect('/');
        }elseif (Auth::guard('user')->attempt(['email'=> $request->email, 'password'=> $request->password])){
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->route('/');
        }
    }
}