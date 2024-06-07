<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InvestorsController extends Controller
{
    public function index()
    {
        $investors = Investor::all();
        return view('dashboard.investors')->with('investors', $investors);
    }
    public function create()
    {
        return view('dashboard.create-investor');
    }
    public function store(Request $request)
    {
        Investor::create([
            'name' => $request->input('investorName'),
            'email' => $request->input('investorEmail'),
            'password' => Hash::make($request->input('investorPassword')),
        ]);
        return redirect()->route('investors');
    }
    public function edit(Investor $investor)
    {
        return view('dashboard.edit-investor')->with('investor', $investor);
    }
    public function update(Request $request, Investor $investor)
    {
        $investor->update([
            'name' => $request->input('investorName'),
            'email' => $request->input('investorEmail'),
            'password' => $request->input('investorPassword') != "" ?Hash::make($request->input('investorPassword')):$investor->password,
        ]);
        return redirect()->route('investors');
    }
    public function destroy(Investor $investor)
    {
        $investor->delete();
        return redirect()->route('investors');
    }
}
