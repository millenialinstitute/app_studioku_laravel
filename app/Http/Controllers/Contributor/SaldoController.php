<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contributor;

class SaldoController extends Controller
{
    public function index ( ) 
    {
    	$total = Auth::user()->contributor->saldo;
    	return view('contributor.saldo' , [
    						'total' => $total,
				    	]);
    }
}
