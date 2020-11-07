<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Tag;
use App\Category;
use App\Item;
use App\ItemTag;
use App\ItemFile;

class ItemController extends Controller
{
    /**
      * route: /contributor/item/upload
      * method: get
      * params: null
      * description: 
        * this method to return view upload item
      * return : @view
    */
    public function uploadCreate ( ) 
    {
        $categories = Category::get();
    	return view('contributor.item.upload' , [
            'user' => Auth::user(),
            'categories' => $categories,
        ]);
    }


    
    
    /**
      * route: /contributor/item/upload
      * method: post
      * params: preview , file item , title , tag , cost , category
      * description: 
        * this method to upload and create item
      * return : @var bool
    */
    public function uploadStore (Request $request) 
    {
        /* ---------- validation data ------------ */
            $request->validate([
                'preview'  => 'required|file',
                'itemFile' => 'required|file',
                'title'    => 'required|string|min:3|max:30',
                'tag'      => 'required|string|min:1|max:20',
                'cost' => 'required|numeric',
                'category' => 'required|numeric',
            ]);
        /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
        $contributor = Auth::user()->contributor;
        $status = $contributor->status;
        if($status === 'waiting') {
            $item = $contributor->item->where('status' , 'waiting');
            if($item->count() === 5) {
                return redirect(url()->previous())->with('limit' , 'Item yang Anda upload sudah mencapai 5 item!');
            }
        } else if($status === 'reject') {
            Auth::user()->contributor->update(['status' => 'waiting']);
        }
        
        /* ---------- function get data item file ------------ */
            $name = Str::random(3) . '_' . date('Y-m-d_H-i-s_') . Str::random(30) . '.';
            function getData($file , $option) {
                if($option === 'size') {
                    return $file->getSize();
                } else if($option === 'extension') {
                    return $file->getClientOriginalExtension();
                }
            }
        /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */


        /* ---------- upload file and preview to storage ------------ */
            $preview = $request->preview;
            $itemFile = $request->itemFile;
            $previewData = [
                'name' => $name . getData($preview , 'extension'),
                'size' => getData($preview , 'size'),
                'extension' => getData($preview , 'extension'),
            ];
            $itemFileData = [
                'name' => $name . getData($itemFile , 'extension'),
                'size' => getData($itemFile , 'size'),
                'extension' => getData($itemFile , 'extension'),
            ];

            Storage::putFileAs('public\photos' , new File($preview) , $previewData['name']);
            Storage::putFileAs('public\items' , new File($itemFile) , $itemFileData['name']);
        /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */





        /* ----------------------------- Upload Data Into Storage ------------------------------ */ 
            /* ---------- create item data ------------ */
                $contributorId = Auth::user()->contributor->id;
                Item::create([
                    'contributor_id' => $contributorId,
                    'title'          => $request->title,
                    'image'          => $previewData['name'],
                    'category_id'    => $request->category,
                    'cost'           => $request->cost,
                    'status'         => 'waiting',
                ]);
                $itemId = Item::get()->last()->id;
            /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */


            /* ---------- create tag and item tag ------------ */
                $tagStatus = Tag::where('name' , $request->tag)->get();
                if(!$tagStatus->count()) {
                    Tag::create(['name' => $request->tag]);
                    $tagId = Tag::get()->last()->id;
                } else {
                    $tagId = $tagStatus->first()->id;
                }
                ItemTag::create([
                    'item_id' => $itemId,
                    'tag_id'  => $tagId,
                ]);
            /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */


            /* ---------- create item file ------------ */
                $filePreview = [
                    'item_id'   => $itemId,
                    'name'      => $previewData['name'],
                    'size'      => $previewData['size'],
                    'extension' => $previewData['extension'],
                    'type'      => 'preview',
                ];
                $fileItem = [
                    'item_id'   => $itemId,
                    'name'      => $itemFileData['name'],
                    'size'      => $itemFileData['size'],
                    'extension' => $itemFileData['extension'],
                    'type'      => 'file',
                ];
                ItemFile::create($filePreview);
                ItemFile::create($fileItem);
            /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
        /* ==================================================================================== */

        return redirect('/contributor/item/waiting')->with('success' , 'Item berhasil dikirim!');
    }
      


    
    
    /**
      * route: /contributor/item/waiting
      * method: get
      * params: null
      * description: 
        * this method to return view waiting item list
      * return : @view
    */
    public function waiting ( ) 
    {
        /* ---------- get item list where status waiting ------------ */
        $contributorId = Auth::user()->contributor->id;
        $items = Item::where('status' , 'waiting')
                    ->where('contributor_id' , $contributorId)
                    ->latest()->paginate(5);

    	return view('contributor.item.waiting' , [
            'user'  => Auth::user(),
            'items' => $items,
        ]);
    }
        

    
    
    /**
      * route: /contributor/item/reject
      * method: get
      * params: null
      * description: 
        * this method will return view with list item reject
      * return : @view
    */
    public function reject ( ) 
    {
        $contributorId = Auth::user()->contributor->id;
        $items = Item::where('contributor_id' , $contributorId)
                        ->where('status' , 'reject')
                        ->latest()
                        ->paginate(5);

    	return view('contributor.item.reject' , [
                                            'items' => $items,
                                        ]);
    }


    
    
    /**
      * route: /contributor/item/accept
      * method: get
      * params: null
      * description: 
        * this method will return view with list item accept
      * return : @view
    */
    public function accept ( ) 
    {
        $contributorId = Auth::user()->contributor->id;
        $items = Item::where('contributor_id' , $contributorId)
                        ->where('status' , 'accept')
                        ->latest()
                        ->paginate(5);


    	return view('contributor.item.accept' , [
                                            'items' => $items
                                        ]);
    }



    
    
    /**
      * route: /contributor/item/destroy/{id}
      * method: delete
      * params: id
      * description: 
        * this method will destroy item and file item
      * return : @redirect
    */
    public function destroyItem (Request $request , $id) 
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
