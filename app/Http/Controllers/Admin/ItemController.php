<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Tag;
use App\Item;
use App\ItemReject;
use App\ManageReject;


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
        $items = Item::where('status' , 'accept')->latest()->paginate(5);
        $topItems = Item::where('status' , 'accept')->orderBy('sold' , 'desc')->limit(3)->get();
        $itemTotal = Item::where('status' , 'accept')->count();
        $itemWait = Item::where('status' , 'waiting')->get()->count();
    	return view('admin.item.all' , [
                                'itemTotal' => $itemTotal,
                                'itemWait'  => $itemWait,
                                'topItems'  => $topItems,
                                'items'     => $items,
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
        $rejects = ItemReject::latest()->get();
        return view('admin.item.waiting-detail' , [
                                        'user'    => Auth::user(),
                                        'item'    => $item,
                                        'rejects' => $rejects,
                                    ]);
    }




    
    
    /**
      * route: /admin/item/waiting/{id}/reject
      * method: post
      * params: item id , rejects id
      * description: 
        * this method to reject item with reason list
      * return : @redirect
    */
    public function waitingReject (Request $request , $id) 
    {
        foreach($request->except('_token') as $rejectId) {
            ManageReject::create([
                'item_id' => $id,
                'reject_id' => $rejectId,
            ]);
        }
        Item::where('id' , $id)->update(['status' => 'reject']);

        return redirect('admin/item/waiting')->with('reject' , 'Item berhasil ditolak!');
    }


    
    
    /**
      * route: /admin/item/waiting/{id}/accept
      * method: put
      * params: item id
      * description: 
        * this method will accept item waiting
      * return : @redirect
    */
    public function waitingAccept (Request $request , $id) 
    {
        Item::where('id' , $id)->update(['status' => 'accept']);
        return redirect('admin/item/waiting')->with('accept' , 'Item berhasil diterima!');
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
        $tags = Tag::latest()->get();
    	return view('admin.item.tag' , [
                                    'user' => Auth::user(),
                                    'tags' => $tags,
                                ]);
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
        $rejects = ItemReject::latest()->get();
    	return view('admin.item.reject' , [
                                'user' => Auth::user(),
                                'rejects' => $rejects,
                        ]);
    }


    
    
    /**
      * route: /admin/item/reject
      * method: post
      * params: title , description
      * description: 
        * this method to create reject item reason
      * return : @var array
    */
    public function rejectStore (Request $request) 
    {
        $request->validate([
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:5|max:200',
        ]);

        ItemReject::create($request->all());

        return redirect(url()->previous())->with('add' , 'Data berhasil ditambahkan!');
    }

      

    
    
    /**
      * route: /admin/item/reject/{id}/delete
      * method: delete
      * params: id
      * description: 
        * this method to destroy row in item_rejects 
      * return : @redirect
    */
    public function rejectDestroy (Request $request , $id) 
    {
        ItemReject::destroy($id);

        return redirect(url()->previous())->with('delete', 'Data berhasil dihapus!');
    }
        
    

    
    
    /**
      * route: /admin/item/download/{id}
      * method: post
      * params: id
      * description: 
        * this method will download item file
      * return : @redirect
    */
    public function itemDownload (Request $request , $id) 
    {
        $item = Item::find($id);
        $file = $item->file->where('type', 'file')->first();
        $fileItem = 'public/items/' . $file->name;
        $extension = $file->extension;

        return Storage::download($fileItem , $item->title . '.' . $extension);
    }



    
    
    /**
      * route: /admin/item/destroy/{id}
      * method: delete
      * params: id
      * description: 
        * this method will destroy row item with file there
      * return : @redirect
    */
    public function itemDestroy (Request $request , $id) 
    {
        $item = Item::find($id);
        $file = $item->file;
        $preview = 'public/photos/' . $file->where('type' , 'preview')->first()->name;
        $fileItem = 'public/items/' . $file->where('type', 'file')->first()->name;
        Storage::delete([$preview , $fileItem]);
        Item::destroy($id);
        return redirect(url()->previous())->with('delete' , 'Item berhasil dihapus!');
    }
      
        
}
