<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.createUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'is_admin' => 'required',
        ]);

        $user = new user;
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        // $user->password = $request->get('password');
        $user->password = Hash::make($request->get('password'));
        // Hash::make($user->password = $request->get('password'));
        // $user->password = $request->get(Hash::make('password'));
        $user->is_admin = $request->get('is_admin');;

        User::create($request->all());
        return redirect()->route('user.index')->with('success','Product created successfully.');

        // return redirect()->route('user.index');

        
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
