<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\FAQCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }
    public function help()
    {
        $faqs_categories = FAQCategory::all();
        return view('dashboard.help')->with('faqs_categories', $faqs_categories);
    }
    public function settings()
    {
        return view('dashboard.settings');
    }
    public function style_edit()
    {
        return view('dashboard.change-style');
    }
    public function style_update(Request $request)
    {
        Auth::user()->update([
            'dark' => $request->has('dark_mode'),
            'primary_color' => $this->hexToRgb($request->input('primary_color')),
            'secondary_color' => $this->hexToRgb($request->input('secondary_color')),
            'warning_color' => $this->hexToRgb($request->input('warning_color')),
            'danger_color' => $this->hexToRgb($request->input('danger_color')),
            'success_color' => $this->hexToRgb($request->input('success_color'))
        ]);
        return redirect()->route('style.edit');
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
