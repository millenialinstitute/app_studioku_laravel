<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class MemberController extends Controller
{
    public function index ( ) 
    {
    	$members = User::where('level_user_id' , 3)->paginate(15);
    	return view('admin.member' , [
    							'members' => $members,
					    	]);
    }
}
