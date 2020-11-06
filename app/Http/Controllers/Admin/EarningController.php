<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SaldoStatistic;

class EarningController extends Controller
{
   public function index ( ) 
   {
   		$dataAll = SaldoStatistic::get();
   		$totalSaldo = 0;
   		foreach ($dataAll as $data) {
   			$totalSaldo+= $data->total;
   		}

   		if(strlen($totalSaldo) > 6) {
   			$totalSaldo = (int)substr($totalSaldo, 0, -5) / 10;
   			$totalScope = 'Jt';
   		} else {
            $totalScope = '';
         }

   		return view('admin.earning' , [
								'user'       => Auth::user(),
								'total'      => $totalSaldo, 
								'totalScope' => $totalScope,
				   		]);
   }			
}
