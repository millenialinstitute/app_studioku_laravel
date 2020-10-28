<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Contributor;

class DashboardController extends Controller
{
    public function index ( ) 
    {
    	return view('member.dashboard');
    }

    public function becomeContributor () 
    {
    	$user = Auth::user();
    	User::where('id' , $user->id)->update(['level_user_id' => 2]);
    	Contributor::create([
    		'user_id' => $user->id,
    		'status' => 'waiting',
    	]);

    	return redirect('/contributor/dashboard');
    }
}
