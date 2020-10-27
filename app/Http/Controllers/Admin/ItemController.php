<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
	/**
	  * route: /admin/item/all
	  * method: get
	  * params: null
	  * description: 
	    * this method will show all item
	  * return : @view
	*/
    public function all ( ) 
    {
        $itemTotal = Item::where('status' , 'accept')->get()->count();
        $itemWait = Item::where('status' , 'waiting')->get()->count();

    	return view('admin.item.all' , [
                                'itemTotal' => $itemTotal,
                                'itemWait'  => $itemWait
                          ]);
    }


    
    
    /**
      * route: /admin/item/waiting
      * method: get
      * params: null
      * description: 
        * this method will show all waiting item
      * return : @view
    */
    public function waiting ( ) 
    {
        $itemTotal = Item::where('status' , 'accept')->get()->count();
        $itemWait = Item::where('status' , 'waiting')->get()->count();

    	return view('admin.item.waiting' , [
                                'itemTotal' => $itemTotal,
                                'itemWait'  => $itemWait
                          ]);
    }


    
    
    /**
      * route: /admin/item/tag
      * method: get
      * params: null
      * description: 
        * this method will show all item tags
      * return : @view
    */
    public function tag ( ) 
    {
    	return view('admin.item.tag');
    }


    
    
    /**
      * route: /admin/item/category
      * method: get
      * params: null
      * description: 
        * this method will show all item categories
      * return : @view
    */
    public function category ( ) 
    {
    	return view('admin.item.category');
    }


    
    
    /**
      * route: /admin/item/reject
      * method: get
      * params: null
      * description: 
        * this method will show all rejects item
      * return : @view
    */
    public function reject ( ) 
    {
    	return view('admin.item.reject');
    }
    	
    	
    	
    	
}
