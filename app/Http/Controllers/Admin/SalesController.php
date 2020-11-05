<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\SaldoItem;
use App\SaldoStatistic;

class SalesController extends Controller
{
    public function index ( ) 
    {
    	// get data for card thumb
    	# all
    	$allItem = SaldoItem::get()->count();
    	$CurrentMonth = SaldoStatistic::where('month' , date('m'))
    								->get();

    	#current
    	$itemCurrent = 0;
    	foreach ($CurrentMonth as $data) {
    		$itemCurrent+= $data->item->count();
    	}

    	# one month ago
    	$ago = (int)date('m') - 1;
    	$MonthAgo = SaldoStatistic::where('month' , $ago)->get();
    	$itemAgo = 0;
    	foreach ($MonthAgo as $data) {
    		$itemAgo+=$data->item->count();
    	}

    	// get data for list item
        # top sales
        $topSales = Item::select(['id' , 'title' , 'image' , 'cost' , 'sold'])->get()->sortByDesc('sold')->take(3);
        
        # newest sales
    	$dataItem = SaldoItem::latest()->get();
    	$newestSales = collect([]);
    	foreach ($dataItem as $data) {
    		$newestSales->push($data->item);
    	}

        $pagination = collect([]);
        $limitpage = ceil($newestSales->count()/5);
        for ($i=1; $i <= $limitpage; $i++) { 
            $pagination->push([
                'text' => $i,
                'link' => url('/admin/sales/?page=' . $i),
            ]);
        }
        
    	return view('admin.sales' , [
                    'user'        => Auth::user(),
                    'all'         => $allItem,
                    'current'     => $itemCurrent,
                    'ago'         => $itemAgo,
                    'topSales'    => $topSales,
                    'newestSales' => $newestSales,
                    'pagination'  => $pagination,
		    	]);
    }
}
