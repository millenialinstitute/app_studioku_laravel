<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Collection;
use App\ItemLike;
use App\Category;
use App\Blog;
use App\Contributor;

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
        $blogs = Blog::latest()->limit(3)->get();

    	return view('landing' , [
    							'auth' => Auth::check(),
    							'itemNewest' => $itemNewest->chunk(5),
                                'blogs' => $blogs,
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
        $user = Auth::user();
        if($user) {
            $memberId = $user->member->id;
            $collections = Collection::where('member_id' , $memberId)->get();
        } else {
            $collections = [];
        }

        $like = ItemLike::where('item_id' , $id)
                            ->where('user_id' , $user->id)
                            ->get()->count();

    	return view('item-detail'  , [
                                    'auth'        => Auth::check(),
                                    'item'        => $item,
                                    'collections' => $collections,
                                    'like'        => $like ? true : false,
								]);
    }



    
    
    /**
      * route: likeItem
      * method: post
      * params: id
      * description: 
        * this method for like item
      * return : @redirect
    */
    public function likeItem (Request $request , $id) 
    {
        if(Auth::check()) {
            $result = ItemLike::where('item_id' , $id)
                            ->where('user_id' , Auth::user()->id)
                            ->get()->count();
            if(!$result) {
                ItemLike::create([
                    'item_id' => $id,
                    'user_id' => Auth::user()->id,
                ]);
            }
        } 
        return redirect(url()->previous())->with('like' , 'Item disukai!');
    }


    
    
    /**
      * route: /item/category/{id}
      * method: get
      * params: category
      * description: 
        * this method for display item as category
      * return : @view
    */
    public function category (Request $request , $category) 
    {
        $items = Category::where('name' , $category)->first()->item;
        
        return view('item-category' , [
                                    'auth'  => Auth::check(),
                                    'items' => $items,
                            ]);
    }



    
    
    /**
      * route: /blog/detail
      * method: get
      * params: id
      * description: 
        * this method for show detail blog
      * return : @view
    */
    public function blogDetail (Request $request , $id) 
    {
        $blogs = Blog::latest()->limit(3)->get();

        $blog = Blog::find($id);

        return view('blog-detail' , [
                        'auth'  => Auth::check(),
                        'blog'  => $blog,
                        'blogs' => $blogs,
                    ]);
    }



    
    
    /**
      * route: /contributor/portofolio/{id}
      * method: get
      * params: id
      * description: 
        * this method for display portoflio contributor
      * return : @view
    */
    public function portofolio (Request $request , $id) 
    {
        $contributor = Contributor::find($id);

        return view('portofolio' , [
                            'auth' => Auth::check(),
                            'contributor' => $contributor,
                        ]);
    } 
      
        
        
        

}
