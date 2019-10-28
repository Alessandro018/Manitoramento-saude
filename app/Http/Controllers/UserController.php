<?php

namespace App\Http\Controllers;

use App\User;
use App\Checkup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;

class UserController extends Controller
{

    public function detalhe($id)
    {
        $checkup = DB::table('checkups')
        ->select('checkups.*')
        ->where('id',$id)
        ->first();
        return view('user.detalhe', ['checkup' => $checkup]);
    }
}