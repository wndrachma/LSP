<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('users.index', [
            'petugas' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insertdatauser(Request $request)
    {
        //
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'roles' => ['required'],
            'aktif' => ['required']
        ]);
        User::create($data);
        return redirect('/users')->with('success', 'New User Data Created Successfully');
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
        $users = User::find($id);
        if (!$users) return redirect()->route('users.edit');
        return view('users.edit', [
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->password) $users->password = bcrypt($request->password);
        $users->roles = $request->roles;
        $users->save();
        return redirect('/users')->with('success', 'The user data successfully update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusUsr($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/users')->with('success', 'The user data successfully delete!');
    }
    
}
