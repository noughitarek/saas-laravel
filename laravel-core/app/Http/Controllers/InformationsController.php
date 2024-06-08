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
        $informations = Information::where('investor', $investor->id)->get();
        return view('dashboard.informations-investor')->with('informations', $informations);
    }
    public function create(){

    }
    public function store(Request $request){

    }
    public function edit(Infromation $information){

    }
    public function update(Request $request, Infromation $information){
        
    }
    public function destroy(Infromation $information){

    }
}
