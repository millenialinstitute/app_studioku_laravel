<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Item;

class DashboardController extends Controller
{
    public function index () 
    {
    	$contributors = User::where('level_user_id' , 2)->get()->count();
    	$members = User::where('level_user_id' , 3)->get()->count();
    	$itemsCount = Item::get()->count();

    	return view('admin.dashboard' , [
								'contributors' => $contributors,
								'members'      => $members,
								'itemsCount'   => $itemsCount,
					    	]);
    }
}
