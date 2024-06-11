<?php

namespace App\Http\Controllers;

use App\Models\FAQCategory;
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
    public function help()
    {
        $faqs_categories = FAQCategory::all();
        return view('investors.help')->with('faqs_categories', $faqs_categories);
    }

    public function style_edit()
    {
        return view('investors.change-style');
    }
    public function style_update(Request $request)
    {
        Auth::guard('investor')->user()->update([
            'dark' => $request->has('dark_mode'),
            'primary_color' => $this->hexToRgb($request->input('primary_color')),
            'secondary_color' => $this->hexToRgb($request->input('secondary_color')),
            'warning_color' => $this->hexToRgb($request->input('warning_color')),
            'danger_color' => $this->hexToRgb($request->input('danger_color')),
            'success_color' => $this->hexToRgb($request->input('success_color'))
        ]);
        return redirect()->route('investors.style.edit');
    }
    function hexToRgb($hex) {
        // Remove any leading '#' symbol
        $hex = str_replace('#', '', $hex);
        
        // Break the hexadecimal color code into its RGB components
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        
        // Return the RGB values as a string separated by spaces
        return "$r $g $b";
    }
}
