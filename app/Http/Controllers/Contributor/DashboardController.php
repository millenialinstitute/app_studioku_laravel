<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Contributor;
use App\SaldoStatistic;
use App\SaldoItem;

class DashboardController extends Controller
{
    public function index ( ) 
    {
    	$contributorId = Auth::user()->contributor->id;
    	// get data for card thumb
    	$items = Item::where('contributor_id' , $contributorId)
    			->get();
    	$soldItems = 0;
    	foreach ($items as $sold) {
    		$soldItems+=$sold['sold'];
    	}
    	$saldo = Auth::user()->contributor->saldo;


    	// get data for item status
    	$itemWaiting = Item::where('contributor_id' , $contributorId)
    						->where('status' , 'waiting')
    						->get()->count();
    	$itemReject = Item::where('contributor_id' , $contributorId)
    						->where('status' , 'reject')
    						->get()->count();
    	$itemAccept = Item::where('contributor_id' , $contributorId)
    						->where('status' , 'accept')
    						->get()->count();


    	// last sold item
    	$statistic = SaldoStatistic::where('contributor_id' , $contributorId)->latest()->limit(5)->get();
    	$itemsLast = collect([]);
    	foreach ($statistic as $data) {
    		foreach ($data->item->sortByDesc('created_at') as $item) {
    			$itemsLast->push($item->item);
    		}
    	}

    	// top sold item
    	$topItems = Item::where('contributor_id' , $contributorId)->orderBy('sold' , 'desc')
    					->where('sold' , '>' , 0)
    					->limit(5)
    					->get();

    	return view('contributor.dashboard' , [
								'user'      => Auth::user(),
								'saldo'     => $saldo,
								'soldItems' => $soldItems,
								'totalItem' => $items->count(),

								'itemWaiting' => $itemWaiting,
								'itemReject' => $itemReject,
								'itemAccept' => $itemAccept,

								'lastSold'  => $itemsLast,
								'topItems'  => $topItems,
					    	]);
    }
}
