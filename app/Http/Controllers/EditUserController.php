<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EditUserController extends Controller
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
        return view('admin.editProfile');
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
        $currentUser = \Auth::user();
        $user        = User::findOrFail($id);
    
        if ($user->id != $currentUser->id) {
            abort(403);
        }
        $id = User::where('id', $id)->first();
        return view('admin.editProfile', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'is_admin' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->password = Hash::make($request->get('password'));
        $user->is_admin = $request->get('is_admin');
        $user->save();
    
        // $id->update();
    
        return redirect('home')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();

    }
}
