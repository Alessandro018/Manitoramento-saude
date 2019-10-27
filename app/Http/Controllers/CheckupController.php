<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Checkup;
class CheckupController extends Controller
{
    public function index()
    {
    	$pacientes = User::all();
    	return view('checkup.index', ['pacientes' => $pacientes]);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'user_id' => 'required',
    		'data_checkup' => 'required',
    		'peso' => 'required',
    		'altura' => 'required',
    		'pressao_arterial' => 'required',
    		'nivel_glicose' => 'required',
    		'colesterol_LDL' => 'required',
    		'colesterol_HDL' => 'required',
    	]);
    	Checkup::create($request->all());
    	return redirect()->route('checkup.index')
            ->with('success','Check-up cadastrada com successo.');
    }
}
