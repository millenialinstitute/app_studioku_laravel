<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Bank;

class PaymentController extends Controller
{

	
	
	/**
	  * route: /admin/payment/method
	  * method: get
	  * params: null
	  * description: 
	    * this method will display list bank
	  * return : @view
	*/
		
    public function methodPayment () 
    {
    	$banks = Bank::latest()->get();

    	return view('admin.payment.method' , [ 
    								'user' => Auth::user(),
    								'banks' => $banks,
						    	]);
    }


    
    
    /**
      * route: /admin/payment/method/create
      * method: post
      * params: name , customer, card_number
      * description: 
        * this method will create new row in table bank
      * return : @redirect
    */
    public function methodStore (Request $request) 
    {
    	$request->validate([
    		'name' => 'required|string|min:3|max:25',
    		'customer' => 'required|string|min:3|max:25',
    		'card_number' => 'required|string|max:25|min:10',
    	]);

    	Bank::create([
    		'name' => $request->name,
    		'customer' => $request->customer,
    		'card_number' => $request->card_number,
    	]);


    	return redirect(url()->previous())->with('add' , 'Data berhasil ditambahkan!');
    }


    
    
    /**
      * route: /admin/payment/method/delete/{id}
      * method: delete
      * params: id
      * description: 
        * this method will destroy payment bank in db
      * return : @redirect
    */
    public function methodDelete (Request $request , $id) 
    {
    	Bank::destroy($id);
    	
    	return redirect(url()->previous())->with('delete' , 'Data berhasil dihapus!');
    }
    	
    			
}
