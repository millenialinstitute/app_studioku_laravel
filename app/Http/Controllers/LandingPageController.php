<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;

class LandingPageController extends Controller
{
	/**
	  * route: /
	  * method: get
	  * params: null
	  * description: 
	    * this method return view lading page
	  * return : @view
	*/
    public function index ( ) 
    {
    	$itemNewest = Item::where('status' , 'accept')
    						->latest()
    						->limit(10)
    						->get();
    	return view('landing' , [
    							'auth' => Auth::check(),
    							'itemNewest' => $itemNewest->chunk(5),
					    	]);
    }



    
    
    /**
      * route: /item/detail/{id}
      * method: get
      * params: id
      * description: 
        * this method will return detail item
      * return : @view
    */
    public function detailItem (Request $request , $id) 
    {
    	$item = Item::find($id);
    	
    	return view('item-detail'  , [
    								'auth' => Auth::check(),
    								'item' => $item,
								]);
    }
    		
}
