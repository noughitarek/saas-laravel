<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function index(){
        $investors = Investor::all();
        return view('dashboard.informations')->with('investors', $investors);
    }
    public function investor_index(Investor $investor){
        $informations = Information::where('investor_id', $investor->id)->get();
        return view('dashboard.informations-investor')->with('informations', $informations)->with("investor", $investor);
    }
    public function create(){
        $investors = Investor::all();
        return view('dashboard.create-informations')->with('investors', $investors);

    }
    public function store(Request $request){
        Information::create([
            'text1' => $request->input('informationText1'),
            'text2' => $request->input('informationText2'),
            'icon' => $request->input('informationIcon'),
            'change' => $request->input('informationChange'),
            'color' => $request->input('informationColor'),
            'investor_id' => $request->input('investor_id'),
            'width' => $request->input('informationWidth'),
            'width_lg' => $request->input('informationWidth_lg'),
        ]);
        return redirect()->route('informations.investor', $request->input('investor_id'));
    }
    public function edit(Information $information){

    }
    public function update(Request $request, Information $information){
        
    }
    public function destroy(Information $information){
        $investor_id = $information->investor_id;
        $information->delete();
        return redirect()->route('informations.investor', $investor_id);
    }
}
