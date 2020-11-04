<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Carbon;

class MemberController extends Controller
{
	/**
	  * route: /admin/member
	  * method: get
	  * params: null
	  * description: 
	    * this method for show all member
	  * return : @view
	*/
		
    public function index ( ) 
    {
    	$members = User::where('level_user_id' , 3)->paginate(10);
    	
    	return view('admin.member' , [
									'user'    => Auth::user(),
									'members' => $members,
					    	]);
    }


    
    
    /**
      * route: /admin/member/{id}
      * method: get
      * params: id
      * description: 
        * this method for show detail data member
      * return : @view
    */
    	
    public function detail (Request $request , $id) 
    {
    	$member = User::find($id);
    	return view('admin.member-detail' , [
									'user'   => Auth::user(),
									'member' => $member,
					    	]);
    }
}
