<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
// use App\Models\Customers;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/login');
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('dashboard.index');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
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



    public function login_proses(Request $request){
        if(Auth::guard('customers')->attempt(['email'=> $request->email, 'password'=> $request->password])){
            return redirect('/');
        }elseif (Auth::guard('user')->attempt(['email'=> $request->email, 'password'=> $request->password])){
            return redirect()->route('dashboard.index');
        }else{
            return redirect('/');
        }
    }
    
    public function logout(){
        if (Auth::guard('customers')->check()){
            Auth::guard('customers')->logout();
        }elseif (Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return redirect('/');
    }
}