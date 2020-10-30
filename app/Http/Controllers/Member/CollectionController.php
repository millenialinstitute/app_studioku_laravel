<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Collection;
use App\CollectItem;

class CollectionController extends Controller
{
	/**
	  * route: /member/collection
	  * method: get
	  * params: null
	  * description: 
	    * this method will display all collection member
	  * return : @view
	*/
    public function index ( ) 
    {
    	$memberId = Auth::user()->member->id;
    	$collections = Collection::where('member_id' , $memberId)
    								->get();


    	return view('member.collection' , [
								'user'        => Auth::user(),
								'collections' => $collections,
					    	]);
    }


    
    
    /**
      * route: /member/collection/create
      * method: post
      * params: name
      * description: 
        * this method will create new collection
      * return : @redirect
    */

    public function store (Request $request) 
    {
    	$request->validate([ 'name' => 'required|string|min:3|max:20' ]);
    	$memberId = Auth::user()->member->id;
    	Collection::create([
    				'member_id' => $memberId,
    				'name' => $request->name,
		    	]);
    	
    	return redirect(url()->previous())->with('add' , 'Koleksi berhasil ditambahkan!');
    		
    }


    
    
    /**
      * route: /member/collection/item/{id}/add
      * method: post
      * params: item id
      * description: 
        * this method for adding item into collection
      * return : @redirect
    */
    public function addItem (Request $request , $id) 
    {
        $collections = json_decode($request->collections);
        foreach ($collections as $collectId) {
            $check = CollectItem::where('collection_id' , $collectId)
                                ->where('item_id' , $id)
                                ->get()
                                ->count();
            if(!$check) {
                CollectItem::create([
                    'collection_id' => $collectId,
                    'item_id'       => $id
                ]);
            }
        }

        return redirect(url()->previous())->with('add' , 'Item berhasil ditambahkan');
            
    }
        
    	
}
