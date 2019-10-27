<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckupController extends Controller
{
    public function index()
    {
    	return view('checkup.index');
    }
}
