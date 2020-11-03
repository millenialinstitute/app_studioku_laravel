<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OwnedItem;
use App\ItemLike;
use App\Collection;


class ProfileController extends Controller
{

	
	
	/**
	  * route: /member/profile
	  * method: get
	  * params: null
	  * description: 
	    * this method for show profile member
	  * return : @view
	*/
		
    public function index ( ) 
    {
    	$memberId = Auth::user()->member->id;
        $owned = OwnedItem::where('member_id' , $memberId)->get()->count();
        $likes = ItemLike::where('user_id' , Auth::id())->get()->count();
        $collection = Collection::where('member_id' , $memberId)->get()->count();
    	return view('member.profile' , [
							'user'       => Auth::user(),
							'owned'      => $owned,
							'likes'      => $likes,
							'collection' => $collection,
			    		]);
    }
}
