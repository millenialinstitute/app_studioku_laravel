<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\CartItem;

class CartController extends Controller
{

	
	
	/**
	  * route: /member/cart
	  * method: get
	  * params: null
	  * description: 
	    * this method for display cart member
	  * return : @view
	*/
    public function index ( ) 
    {
        $memberId = Auth::user()->member->id;

        $items = Cart::where('member_id' , $memberId)->get()->first()->item;

    	return view('member.cart' , [
                                'user' => Auth::user(),
                                'items' => $items,
                            ]);
    }


    
    
    /**
      * route: /member/cart/item/{id}/add
      * method: post
      * params: id
      * description: 
        * this method for adding item into cart member
      * return : @redirect
    */
    public function addItem (Request $request , $id) 
    {
    	$memberId = Auth::user()->member->id;
    	$check = Cart::where('member_id' , $memberId)->get()->count();
    	if(!$check) {
    		Cart::create([ 'member_id' => $memberId ]);
    	}

		$cartId = Cart::where('member_id' , $memberId)->get()->first()->id;
    	$check2 = CartItem::where('cart_id' , $cartId)
    						->where('item_id' ,$id)
    						->get()
    						->count();
    	if(!$check2) {
			CartItem::create([
				'cart_id' => $cartId,
				'item_id' => $id,
			]);
    	}

    	return redirect(url()->previous())->with('add' , 'Item berhasil dimasukkan keranjang!');
    }


    
    
    /**
      * route: /member/cart/delete
      * method: delete
      * params: null
      * description: 
        * this method to remove all item in cart
      * return : @redirect
    */
    public function removeAllItem (Request $request) 
    {
        $memberId = Auth::user()->member->id;
        $cartId = Cart::where('member_id' , $memberId)->get()->first()->id;
        CartItem::where('cart_id' , $cartId)->delete();

        return redirect(url()->previous())->with('delete' , 'Semua item berhasil dihapus dari keranjang!');
    }


    
    
    /**
      * route: /member/cart/item/{id}/delete
      * method: delete
      * params: id
      * description: 
        * this method to remove item in cart member
      * return : @redirect
    */
    public function removeItem (Request $request , $id) 
    {
        $memberId = Auth::user()->member->id;
        $cartId = Cart::where('member_id' , $memberId)->get()->first()->id;
        CartItem::where('cart_id' , $cartId)
            ->where('item_id' , $id)
            ->delete();

        return redirect(url()->previous())->with('delete' , 'Item berhasil dihapus!');
    }


    
    
    /**
      * route: /member/cart/payment
      * method: get
      * params: null
      * description: 
        * this method for display payment method
      * return : @redirect
    */
    public function payment () 
    {
        return 'Select Payment';
    }
        
        
        
    	
}
