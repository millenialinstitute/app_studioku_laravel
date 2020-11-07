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
    	$contributor = Auth::user()->contributor;
    	$total = $contributor->saldo;
    	$monthAgo = $contributor->statistic->where('month' , date('m')-1);
    	$currentMonth = $contributor->statistic->where('month' , date('m'));

    	function getSaldo($collection) {
    		$totalSaldo = 0;
    		foreach ($collection as $data) {
    			$totalSaldo+=$data->total;
    		}
    		if(strlen($totalSaldo) > 6) {
    			return $totalSaldo = (int)substr($totalSaldo, 0,-5)/10 . ' Jt';
    		}
    		return $totalSaldo;
    	}

    	$monthAgo = getSaldo($monthAgo);
    	$currentMonth = getSaldo($currentMonth);

    	return view('contributor.saldo' , [
							'total'        => $total,
							'monthAgo'     => $monthAgo,
							'currentMonth' => $currentMonth,
				    	]);
    }
}
