<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Checkup;
use Illuminate\Support\Facades\DB;

class CheckupController extends Controller
{
	public function index()
	{
    	if(auth()->check() && auth()->user()->tipo=='doutor'){

			$checkups = Checkup::all();
			return view('checkup.index', ['checkups' => $checkups]);
		}
		elseif (auth()->check() && auth()->user()->tipo=='usuario') {
			$checkups = DB::table('checkups')
            ->join('users','users.id', '=' ,'checkups.user_id')
            ->select('checkups.*')
            ->where('checkups.user_id',Auth()->user()->id)
            ->get();
             
        return view('user.index', ['checkups' => $checkups]);
		}
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
    	return redirect()->route('checkup.index')
            ->with('success','Check-up cadastrado com successo');
    }

    public function destroy($id)
    {
    	$checkup = Checkup::find($id)->delete();
    	return redirect()->route('checkup.index')
    	->with('success', 'Check-up excluído com successo');
	}
	
	public function edit($id)
    {
        $checkup = Checkup::find($id);
        return view('checkup.edit', ['checkup'=> $checkup]);
	}
	
	public function update(Request $request, $id)
    {
		$checkup = Checkup::find($id);

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
			$checkup->update($request->all());
			
        return redirect()->route('checkup.index')
            ->with('success','Questão atualizada com successo');
    }
}
