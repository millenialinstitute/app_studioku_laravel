<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Contributor;
use App\OwnedItem;
use App\ItemLike;
use App\Collection;

class DashboardController extends Controller
{
    public function index ( ) 
    {
        $memberId = Auth::user()->member->id;
        $owned = OwnedItem::where('member_id' , $memberId)->get()->count();
        $likes = ItemLike::where('user_id' , Auth::id())->get()->count();
        $collection = Collection::where('member_id' , $memberId)->get()->count();

    	return view('member.dashboard', [
                                'user'       => Auth::user(),
                                'owned'      => $owned,
                                'likes'      => $likes,
                                'collection' => $collection,
                        ]);
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
