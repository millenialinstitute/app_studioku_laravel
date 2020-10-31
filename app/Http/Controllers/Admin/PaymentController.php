<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Bank;
use App\ProofPayment;
use App\OwnedItem;

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


    
    
    /**
      * route: /admin/payment/confirm
      * method: get
      * params: null
      * description: 
        * this mehtod will display list payment to confirm
      * return : @view
    */
    public function confirm () 
    {
        $payments = ProofPayment::where('status' , 'waiting')->get();
        return view('admin.payment.confirm' , [
                                    'user' => Auth::user(),
                                    'payments' => $payments,
                                ]);
    }


    
    
    /**
      * route: /admin/payment/confirm/{id}
      * method: get
      * params: id
      * description: 
        * this method for display detail confirm payment member
      * return : @view
    */
    public function confirmDetail (Request $request ,$id) 
    {
        $payment = ProofPayment::find($id);
        return view('admin.payment.confirm-detail' , [
                                            'user' => Auth::user(),
                                            'payment' => $payment,
                                        ]);
    }


    
    
    /**
      * route: /admin/payment/confirm/{id}/reject
      * method: put
      * params: id
      * description: 
        * this method for reject confirm payment
      * return : @redirect
    */
    public function confirmReject (Request $request , $id) 
    {
        ProofPayment::where('id' , $id)->update(['status' => 'reject']);

        return redirect('admin/payment/confirm')->with('reject' , 'Data berhasil ditolak!');
    }


    
    
    /**
      * route: /admin/payment/confirm/{id}/accept
      * method: put
      * params: id
      * description: 
        * this method for accept confirm payment
      * return : @redirect
    */
    public function confirmAccept (Request $request, $id) 
    {
        ProofPayment::where('id' , $id)->update(['status' => 'accept']);
        $proof = ProofPayment::find($id);
        $items = $proof->cart->item;
        foreach ($proof->cart->item as $item) {
            OwnedItem::create([
                'member_id' => $proof->member_id,
                'item_id'   => $item->item->id,
            ]);
        }

        return redirect('admin/payment/confirm')->with('accept' , 'Data berhasil diterima!');
    }



    
    
    /**
      * route: /admin/payment/accept
      * method: get
      * params: null
      * description: 
        * this method for display list payment where status accept
      * return : @view
    */
    public function accept () 
    {
        $payments = ProofPayment::where('status' , 'accept')->latest()->get();

        return view('admin.payment.accept' , [
                                        'user'     => Auth::user(),
                                        'payments' => $payments,
                                ]);
    }


    
    
    /**
      * route: /admin/payment/accept/{id}
      * method: get
      * params: id
      * description: 
        * this method for show detial payment 
      * return : @view
    */
    public function acceptDetail (Request $request , $id) 
      {
            $payment = ProofPayment::find($id);
            return view('admin.payment.reject-detail' , [
                                                'user' => Auth::user(),
                                                'payment' => $payment,
                                          ]);
      }

        
                

        
                
    
      
      
      /**
        * route: /admin/payment/reject
        * method: get
        * params: null
        * description: 
          * this method for display list payment rejected
        * return : @view
      */
      public function reject () 
      {
          $payments = ProofPayment::where('status' , 'reject')->latest()->get();
          return view('admin.payment.reject' , [
                                        'user' => Auth::user(),
                                        'payments' => $payments,
                                  ]);
      }


      
      
      /**
        * route: /admin/payment/reject/{id}
        * method: get
        * params: id
        * description: 
          * this method for display detail data payment confirm where status reject
        * return : @view
      */
      public function rejectDetail (Request $request , $id) 
      {
            $payment = ProofPayment::find($id);
            return view('admin.payment.reject-detail' , [
                                                'user' => Auth::user(),
                                                'payment' => $payment,
                                          ]);
      }


        


    
    
    /**
      * route: /admin/payment/download/proof/{id}
      * method: get
      * params: id
      * description: 
        * this method for download proof file
      * return : @download
    */
    public function downloadProof (Request $request , $id) 
    {
        $proof = ProofPayment::find($id);
        $file = $proof->proof_file;
        $bank = $proof->bankTarget->name;
        $member = str_replace(' ', '', $proof->customer);
        $card_number = $proof->card_number;
        $nameFile = $bank .'__' . $member . '_' . $card_number . substr($file, -4);

        return Storage::download('public/proofs/' . $file , $nameFile);
    }
            
            

    			
}
