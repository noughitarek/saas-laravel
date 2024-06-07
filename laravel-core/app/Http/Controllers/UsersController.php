<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('dashboard.admins')->with('admins', $admins);
    }
    public function create()
    {
        return view('dashboard.create-admin');
    }
    public function store(Request $request)
    {
        User::create([
            'name' => $request->input('userName'),
            'email' => $request->input('userEmail'),
            'password' => Hash::make($request->input('userPassword')),
        ]);
        return redirect()->route('admins');
    }
    public function edit(User $admin)
    {
        return view('dashboard.edit-admin')->with('admin', $admin);
    }
    public function update(Request $request, User $admin)
    {
        $admin->update([
            'name' => $request->input('userName'),
            'email' => $request->input('userEmail'),
            'password' => $request->input('userPassword') != "" ?Hash::make($request->input('userPassword')):$admin->password,
        ]);
        return redirect()->route('admins');
    }
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admins');
    }
}
