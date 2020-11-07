<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SaldoStatistic;
use App\EarningStatistic;

class EarningController extends Controller
{
   public function index ( ) 
   {
   		$dataAll = EarningStatistic::get();
   		$totalSaldo = 0;
         $studiokuSaldo = 0;
         $contributorSaldo = 0;
   		foreach ($dataAll as $data) {
   			$totalSaldo+= $data->income;
            $studiokuSaldo+= $data->studioku;
            $contributorSaldo+= $data->contributor;
   		}

         function getMoney($value) {
            if(strlen($value) > 6) {
               $result = (int)substr($value, 0,-5)/10;
               $scope = 'Jt';
            } else if(strlen($value) > 3) {
               $result = (int)substr($value, 0,-3);
               $scope = 'Rb';
            } else {
               $result = $value;
               $scope = '';
            }

            return $result . $scope;
         }

         $totalSaldo = getMoney($totalSaldo);
         $studiokuSaldo = getMoney($studiokuSaldo);
         $contributorSaldo = getMoney($contributorSaldo);


         // get data for grafik
         $graphic = collect([]);
         $dataGet = EarningStatistic::orderBy('month')->get()->groupBy('month');

         function getMonth($month) {
            $months = ['Januari' , 'Februari' , 'Maret' , 'April' , 'Mei' , 'Juni' , 'Juli' , 'Agustus' , 'September' , 'Oktober' , 'November' , 'Desember'];
            return $months[$month-1];
         }

         foreach ($dataGet as $data) {
            $arrayEarning = [
               'total'       => 0,
               'studioku'    => 0,
               'contributor' => 0,
            ];
            foreach ($data as $earning) {
               $arrayEarning['total'] += $earning->income;
               $arrayEarning['studioku'] += $earning->studioku;
               $arrayEarning['contributor'] += $earning->contributor;
            }
            $graphic->push([
               'month'       => getMonth($data->first()->month),
               'total' => $arrayEarning['total']/1000000,
               'studioku' => $arrayEarning['studioku']/1000000,
               'contributor' => $arrayEarning['contributor']/1000000,
            ]);
         }
         $graphicSaldo = collect([]);
         foreach($graphic as $key => $data) {
            if($key-1 !== -1) {
               $saldoArr = $graphicSaldo->toArray()[$key-1];
               $graphicSaldo->push([
                  'month' => $data['month'],
                  'total' => $data['total'] + $saldoArr['total'],   
                  'studioku' => $data['studioku'] + $saldoArr['studioku'],   
                  'contributor' => $data['contributor'] + $saldoArr['contributor'],   
               ]);
            } else {
               $graphicSaldo->push([
                     'month'       => $data['month'],
                     'total'       => $data['total'],
                     'studioku'    => $data['studioku'],
                     'contributor' => $data['contributor'],
               ]);
            }
         }

   		return view('admin.earning' , [
                        'user'             => Auth::user(),
                        'total'            => $totalSaldo, 
                        'studiokuSaldo'    => $studiokuSaldo,
                        'contributorSaldo' => $contributorSaldo,
                        'graphic'          => json_encode($graphic),
				   		]);
   }			
}
