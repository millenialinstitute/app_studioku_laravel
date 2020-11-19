<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Bank;
use App\ProofPayment;
use App\OwnedItem;
use App\SaldoStatistic;
use App\SaldoItem;
use App\Item;
use App\Contributor;
use App\EarningStatistic;
use App\EarningItem;
use PDF;

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
        $payments = ProofPayment::where('status' , 'waiting')->paginate(5);
        return view('admin.payment.confirm' , [
                                    'user'     => Auth::user(),
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
        $items = collect([]);
        $dataItems = $payment->cart->item;
        foreach ($dataItems as $item) {
            if(!$item->item->owned->where('member_id' , $payment->member_id)->count()) {
              $items->push($item);
            }
        }

        return view('admin.payment.confirm-detail' , [
                                            'user' => Auth::user(),
                                            'payment' => $payment,
                                            'items' => $items,
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
        $proof    = ProofPayment::find($id);
        $items    = collect([]);
        $itemsId  = collect([]);
        $income = [
            'total'       => 0,
            'studioku'    => 0,
            'contributor' => 0,
        ];
        $incomeTotal = 0;

        foreach ($proof->cart->item as $item) {
            if(!$item->item->owned->where('member_id' , $proof->member_id)->count()) {
                $item = $item->item;
                $items->push([
                    'id'             => $item->id,
                    'contributor_id' => $item->contributor_id,
                    'cost'           => $item->cost,
                ]);
                $itemsId->push($item->id);
                OwnedItem::create([
                    'member_id' => $proof->member_id,
                    'item_id'   => $item->id,
                ]);
                $income['total']       += $item->cost;
                $income['studioku']    += (30/100 * $item->cost);
                $income['contributor'] += (70/100 * $item->cost);
            }
        }

        // insert into statistic earning
        $earningStatistic = EarningStatistic::where('date' , date('d'))
                            ->where('month' , date('m'))
                            ->where('year' , date('Y'));

        if(!$earningStatistic->get()->count()) {
            EarningStatistic::create([
                'income'      => 0,
                'studioku'    => 0,
                'contributor' => 0,
                'date'        => date('d'),
                'month'       => date('m'),
                'year'        => date('Y'),
            ]);
        }

        $earning = $earningStatistic->first();

        $earningStatistic->update([
            'income'      => (int)$earning->income + $income['total'],
            'studioku'    => (int)$earning->studioku + $income['studioku'],
            'contributor' => (int)$earning->contributor +  $income['contributor'],
        ]);

        $earningId = $earningStatistic->first()->id;
        foreach ($itemsId as $itemId) {
            EarningItem::create([
                'statistic_id' => $earningId,
                'item_id'      => $itemId,
            ]);
        }



        // insert into statistic contributor
        foreach($items->groupBy('contributor_id') as $contributorId =>  $items) {
            $totalCost = 0;
            SaldoStatistic::create([
                'contributor_id' => $contributorId,
                'total'          => 0,
                'date'           => date('d'),
                'month'          => date('m'),
                'year'           => date('Y'),
            ]);
            $saldoId = SaldoStatistic::where('contributor_id' , $contributorId)
                            ->where('date' , date('d'))
                            ->get()
                            ->last()
                            ->id;

            foreach($items as $item) {
                $totalCost+= $item['cost'];
                $soldItem = Item::find($item['id'])->sold;
                SaldoItem::create([
                    'saldo_id' => $saldoId,
                    'item_id'  => $item['id'],
                    'cost'     => $item['cost'], 
                ]);

                Item::where('id' , $item['id'])->update(['sold' => $soldItem+1]);
            }

            SaldoStatistic::where('id' , $saldoId)->update(['total' => $totalCost]);
            $saldo = Contributor::where('id' , $contributorId)->first()->saldo;
            $saldo += $totalCost;
            Contributor::where('id' , $contributorId)->update(['saldo' => $saldo]);
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
        $payments = ProofPayment::where('status' , 'accept')->latest()->paginate(5);

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
          $payments = ProofPayment::where('status' , 'reject')->latest()->paginate(5);
          return view('admin.payment.reject' , [
                                        'user'     => Auth::user(),
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
                                                'user'    => Auth::user(),
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
          


      
      
      /**
        * route: /admin/payment/download/invoice/{id}
        * method: get
        * params: id
        * description: 
          * this method for downloading invoice file
        * return : @download
      */
      public function printInvoice (Request $request , $id) 
      {
            $payment = ProofPayment::find($id);
            $items = collect([]);
            $dataItems = $payment->cart->item;
            foreach ($dataItems as $item) {
                if(!$item->item->owned->where('member_id' , $payment->member_id)->count()) {
                  $items->push($item);
                }
            }

            return view('admin.payment.invoice' , [
                                                'user'    => Auth::user(),
                                                'payment' => $payment,
                                                'items'   => $items,
                                            ]);
            $pdf =  PDF::loadView('admin.payment.invoice' , [
                                                'user'    => Auth::user(),
                                                'payment' => $payment,
                                                'items'   => $items,
                                            ]);
            return $pdf->download('data_pembayaran.pdf');
      }
          
            

    			
}
