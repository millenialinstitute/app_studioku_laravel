<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\OwnedItem;
use App\Item;
use App\ItemFile;

class DownloadController extends Controller
{
	/**
	  * route: /member/donwload
	  * method: get
	  * params: null
	  * description: 
	    * this method will display all owned items
	  * return : @view
	*/
		

    public function index ( ) 
    {
    	$getItems = OwnedItem::where('member_id' , Auth::user()->member->id)->latest()->get();
    	$items = collect([]);
    	foreach ($getItems as $item) {
    		$item = $item->item;
    		$items->push($item);
    	}

        $pagination = collect([]);
        $limitpage = ceil($items->count()/5);
        for ($i=1; $i <= $limitpage; $i++) { 
            $pagination->push([
                'text' => $i,
                'link' => url('/member/download/?page=' . $i),
            ]);
        }
    	
    	return view('member.download' , [
                                    'user'       => Auth::user(),
                                    'items'      => $items,
                                    'pagination' => $pagination,
						    	]);
    }



    
    
    /**
      * route: /member/download/{id}
      * method: get
      * params: id
      * description: 
        * this method will download file item
      * return : @storage
    */
    public function downloadFile (Request $request , $id) 
    {
    	$item = Item::find($id)->title;
    	$files = ItemFile::where('item_id' , $id)->select(['name' , 'type' , 'extension'])->get();
    	$preview = $files->where('type' ,'preview')->first();

    	return Storage::download('public/photos/' . $preview->name , $item .'.'.$preview->extension);
    }
    	
}
