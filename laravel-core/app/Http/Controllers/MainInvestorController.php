<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainInvestorController extends Controller
{
    public function dashboard()
    {
        $user = Auth::guard('investor')->user()->id;
        $informations = Information::where('investor_id', $user)->get();
        return view('investors.index')->with('informations', $informations);
    }
}
