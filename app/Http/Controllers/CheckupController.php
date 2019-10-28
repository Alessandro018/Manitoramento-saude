<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Checkup;

class CheckupController extends Controller
{
	public function index()
	{
		$checkups = Checkup::all();
		return view('checkup.index', ['checkups' => $checkups]);
	}

    public function create()
    {
    	if(auth()->check() && auth()->user()->tipo=='doutor')
    	{
	    	$pacientes = User::where('tipo', 'usuario')->get();
	    	return view('checkup.create', ['pacientes' => $pacientes]);
    	}
    	return redirect()->route('login');
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
    	return redirect()->route('checkup.create')
            ->with('success','Check-up cadastrado com successo.');
    }
}
