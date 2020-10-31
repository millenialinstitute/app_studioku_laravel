<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ItemLike;

class FavoriteController extends Controller
{
    public function index ( ) 
    {
    	$items = ItemLike::where('user_id' , Auth::id())->latest()->get();

    	return view('member.favorite' , [
    								'user' => Auth::user(),
    								'items' => $items,
						    	]);
    }
}
