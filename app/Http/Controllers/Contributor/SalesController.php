<?php

namespace App\Http\Controllers\Contributor;

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
    	$contributorId = Auth::user()->contributor->id;
    	function getItem($list) {
    		$total = 0;
    		foreach ($list as $data) {
    			$total+=$data->item->count();
    		}
    		return $total;
    	}
    	// get total
    	$statistic = SaldoStatistic::where('contributor_id' , $contributorId)->get();
    	$totalItems = getItem($statistic);
    	

    	// get current
    	$current = $statistic->where('month' , date('m'));
    	$currentItems = getItem($current);

    	// get ago
    	$ago = $statistic->where('month' , (int)date('m')-1);
    	$agoItems = getItem($ago);



    	// last sold item
    	$staticLast = $statistic->sortByDesc('id');
    	$lastSold = collect([]);
    	foreach ($staticLast as $data) {
    		foreach ($data->item->sortByDesc('created_at') as $item) {
    			$lastSold->push($item->item);
    		}
    	}

        $pagination = collect([]);
        $limitpage = ceil($staticLast->count()/5);
        for ($i=1; $i <= $limitpage; $i++) { 
            $pagination->push([
                'text' => $i,
                'link' => url('/contributor/sales/?page=' . $i),
            ]);
        }

    	// top sold item
    	$topSold = Item::where('contributor_id' , $contributorId)->orderBy('sold' , 'desc')
    					->where('sold' , '>' , 0)
    					->limit(5)
    					->get();

    	return view('contributor.sales' , [
                                'user'       => Auth::user(),
                                'total'      => $totalItems,
                                'current'    => $currentItems,
                                'ago'        => $agoItems,
                                'lastSold'   => $lastSold,
                                'topSold'    => $topSold,
                                'pagination' => $pagination,
					    	]);
    }
}
