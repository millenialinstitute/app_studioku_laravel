<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index ( ) 
    {

    	return view('member.profile' , [
    						'user' => Auth::user(),
			    		]);
    }
}
