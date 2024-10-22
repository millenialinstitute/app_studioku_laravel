<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Cart;
use App\CartItem;
use App\Bank;
use App\ProofPayment;
use App\Notifications\NewPaymentNotification;

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
        $cart = Cart::where('member_id' , $memberId)->get();
        $items = collect([]);
        if($cart->count()) {
          $dataItems = $cart->first()->item;
          foreach ($dataItems as $item) {
              if(!$item->item->owned->where('member_id' , $memberId)->count()) {
                $items->push($item);
              }
          }
        } else {
          $items = collect([]);
        }

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
      * route: /memebr/cart/item/{id}/buy
      * method: get
      * params: id
      * description: 
        * this method for buy item
      * return : @redirect
    */

    public function buyItem (Request $request , $id) 
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

      return redirect(url('member/cart/payment'));
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
        $cart = Cart::where('member_id' , $memberId)->get()->first();

        foreach ($cart->item as $item) {
              if(!$item->item->owned->where('member_id' , $memberId)->count()) {
                CartItem::destroy($item->id);
            }
        }

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
        $memberId = Auth::user()->member->id;
        $memberId = Auth::user()->member->id;
        $cart = Cart::where('member_id' , $memberId)->get();
        $items = collect([]);
        if($cart->count()) {
          $dataItems = $cart->first()->item;
          foreach ($dataItems as $item) {
              if(!$item->item->owned->where('member_id' , $memberId)->count()) {
                $items->push($item);
              }
          }
        } else {
          $items = collect([]);
        }

        $banks = Bank::get();

        return view('member.payment-check' , [
                                    'user' => Auth::user(),
                                    'items' => $items,
                                    'banks' => $banks,
                                ]);
    }


    
    
    /**
      * route: /member/cart/payment/{id}
      * method: get
      * params: id
      * description: 
        * this method for fill data user to confirm payment
      * return : @view
    */
    public function paymentConfirm (Request $request , $id) 
    {
        $bank = Bank::find($id);

        // get total payment
        $memberId = Auth::user()->member->id;
        $memberId = Auth::user()->member->id;
        $cart = Cart::where('member_id' , $memberId)->get();
        $items = collect([]);
        if($cart->count()) {
          $dataItems = $cart->first()->item;
          foreach ($dataItems as $item) {
              if(!$item->item->owned->where('member_id' , $memberId)->count()) {
                $items->push($item);
              }
          }
        } else {
          $items = collect([]);
        }
        $payment = 0;
        foreach($items as $item) {
            $payment += $item->item->cost;
        }

        return view('member.payment-confirm', [
                                        'user' => Auth::user(),
                                        'bank' => $bank,
                                        'payment' => $payment,
                                    ]);
    }


    
    
    /**
      * route: /member/cart/payment/{id}
      * method: post
      * params: member_bank , card_number , customer , proof
      * description: 
        * this method for submit proof of payment from member
      * return : @redirect
    */
    public function paymentSubmit (Request $request , $id) 
    {
        $request->validate([
            'member_bank' => 'required|string|max:40',
            'card_number' => 'required|string|min:4|max:30',
            'customer' => 'required|string|min:4|max:30',
            'proof' => 'required|file',
        ]);

        $nameProof = 'Proof_' . date('Y-m-d_') . Str::random(30) . '.' . $request->proof->getClientOriginalExtension();
        Storage::putFileAs('public\proofs' , new File($request->proof) , $nameProof);

        $memberId = Auth::user()->member->id;
        $cartId = Cart::where('member_id' , $memberId)->get()->first()->id;
        $bankId = $id;

        
        ProofPayment::create([
            'bank_id'     => $bankId,
            'member_id'   => $memberId,
            'cart_id'     => $cartId,
            'total'       => $request->total,
            'bank'        => $request->member_bank,
            'customer'    => $request->customer,
            'card_number' => $request->card_number,
            'proof_file'  => $nameProof,
        ]);

        Auth::user()->notify(new NewPaymentNotification());

        return redirect('member/payment')->with('send' , 'Data berhasil dikirimkan!');
    }
        
                    
        
        
        
    	
}
