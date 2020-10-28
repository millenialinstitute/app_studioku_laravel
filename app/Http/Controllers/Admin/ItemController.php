<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Category;

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

        $items = Item::where('status' , 'waiting')->get();

    	return view('admin.item.waiting' , [
                                'user'      => Auth::user(),
                                'itemTotal' => $itemTotal,
                                'itemWait'  => $itemWait,
                                'items'     => $items,
                          ]);
    }



    
    
    /**
      * route: /admin/waiting/{id}
      * method: get
      * params: id
      * description: 
        * this method to show detail item data
      * return : @view
    */
    public function waitingDetail (Request $request , $id) 
    {
        $item = Item::find($id);

        return view('admin.item.waiting-detail' , [
                                        'user' => Auth::user(),
                                        'item' => $item,
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
        $categories = Category::get();
    	return view('admin.item.category' , [ 'categories' => $categories ]);
    }


    
    
    /**
      * route: /admin/item/category
      * method: post
      * params: category
      * description: 
        * this method will create category
      * return : @var array
    */
    public function categoryStore (Request $request) 
    {
        Category::create($request->all());

        return redirect(url()->previous());
    }


    
    
    /**
      * route: /admin/item/category/{id}/delete
      * method: delete
      * params: id
      * description: 
        * this method will destroy row category
      * return : @bool 
    */
    public function categoryDestroy (Request $request , $id) 
    {
        Category::destroy($id);

        return redirect(url()->previous());
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
