<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Item;
use App\Contributor;

class DashboardController extends Controller
{
    public function index () 
    {
    	$contributors = User::where('level_user_id' , 2)->get()->count();
    	$members = User::where('level_user_id' , 3)->get()->count();
    	$itemsCount = Item::get()->count();

        $topContributors = Contributor::where('status' , 'confirmed')
                                        ->orderBy('saldo' , 'desc')
                                        ->limit(5)
                                        ->get();
        $topItems = Item::where('sold' , '>' , 0)->orderBy('sold' , 'desc')->limit(5)->get();

    	return view('admin.dashboard' , [
                                'contributors'    => $contributors,
                                'members'         => $members,
                                'itemsCount'      => $itemsCount,
                                
                                'topContributors' => $topContributors,
                                'topItems'        => $topItems,
					    	]);
    }
}
