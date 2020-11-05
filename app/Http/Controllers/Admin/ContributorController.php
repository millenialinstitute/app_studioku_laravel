<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contributor;
use App\Item;
use App\ItemReject;
use App\ManageReject;

class ContributorController extends Controller
{
	/**
	  * route: /admin/contributor/all
	  * method: get
	  * params: null
	  * description: 
	    * this method for show all contributor
	  * return : @view
	*/
		
	public function all ( ) 
	{
		$dataContributor    = Contributor::where('status' , 'confirmed');
		$totalContributor   = $dataContributor->get()->count();
		$waitingContributor = Contributor::where('status' , 'waiting')->get()->count();
		$topContributors    = $dataContributor->orderBy('saldo' , 'desc')->limit(3)->get();

		$contributors = $dataContributor->latest()->paginate(5);
		return view('admin.contributor-all' , [
										'total'           => $totalContributor,
										'waiting'         => $waitingContributor,
										'topContributors' => $topContributors,

										'contributors'    => $contributors,
									]);
	}


	
	
	/**
	  * route: /admin/contributor/waiting
	  * method: get
	  * params: null
	  * description: 
	    * this method for show contributor where status waiting
	  * return : @view
	*/
		
	public function waiting ( ) 
	{
		$dataContributor    = Contributor::where('status' , 'confirmed');
		$totalContributor   = $dataContributor->get()->count();
		$waitingContributor = Contributor::where('status' , 'waiting')->get()->count();
		$topContributors    = $dataContributor->orderBy('saldo' , 'desc')->limit(3)->get();

		$contributors = Contributor::where('status' , 'waiting')->paginate(5);
		return view('admin.contributor-waiting' , [
										'total'           => $totalContributor,
										'waiting'         => $waitingContributor,
										'topContributors' => $topContributors,
										'contributors'    => $contributors,
									]);
	}


	
	
	/**
	  * route: /admin/contributor/waiting/{id}
	  * method: get
	  * params: id
	  * description: 
	    * this method for display show detail contributor waiting
	  * return : @view
	*/
	public function waitingDetail (Request $request , $id) 
	{
		$contributor = Contributor::find($id);
		return view('admin.contributor-waiting-detail' , [
										'user'        => Auth::user(),
										'contributor' => $contributor,
									]);
	}


	
	
	/**
	  * route: /admin/contributor/waiting/{id}/item/{item}
	  * method: get
	  * params: id , item
	  * description: 
	    * this method to show detail item
	  * return : @view
	*/
	public function waitingItem (Request $request , $id , $item) 
	{
		$contributor = Contributor::find($id);
		$item = Item::find($item);
        $rejects = ItemReject::latest()->get();

		return view('admin.contributor-waiting-detail-item' , [
											'user'        => Auth::user(),
											'contributor' => $contributor,
											'item'        => $item,	
											'rejects'     => $rejects,
										]);
	}


	
	
	/**
	  * route: /admin/contributor/waiting/{id}/item/{item}/accept
	  * method: put
	  * params: id , item
	  * description: 
	    * this method for accept item contributor waiting
	  * return : @redirect
	*/
	public function waitingAccept (Request $request , $id , $item) 
	{
        Item::where('id' , $item)->update(['status' => 'accept']);
        Contributor::where('id' , $id)->update(['status' => 'confirmed']);

		return redirect(url('admin/contributor/waiting/'))->with('accept' , 'Kontributor berhasil diterima!');
	}


	
	
	/**
	  * route: /admin/contributor/waiting/{id}/item/{item}/reject
	  * method: put
	  * params: id , item
	  * description: 
	    * this method for reject item contributor waiting
	  * return : @redirect
	*/
	public function waitingReject (Request $request , $id , $item) 
	{
		$contributor = Contributor::find($id);

		foreach($request->except(['_token' , '_method']) as $rejectId) {
            ManageReject::create([
                'item_id' => $item,
                'reject_id' => $rejectId,
            ]);
        }
        Item::where('id' , $item)->update(['status' => 'reject']);

        $itemCount = $contributor->item->where('status' , 'waiting')->count();
        if($itemCount === 0) {
        	Contributor::where('id' , $id)->update(['status' => 'reject']);
        	return redirect(url('/admin/contributor/waiting'))->with('reject' , 'Kontributor berhasil ditolak!');
        }

		return redirect(url('/admin/contributor/waiting/' . $id))->with('reject' , 'Item berhasil ditolak!');
	}
		
		
		
			


	
	
	/**
	  * route: /admin/contributor/reject
	  * method: get
	  * params: null
	  * description: 
	    * this method for show contributor where status reject
	  * return : @view
	*/
	public function reject () 
	{
		$dataContributor    = Contributor::where('status' , 'confirmed');
		$totalContributor   = $dataContributor->get()->count();
		$waitingContributor = Contributor::where('status' , 'waiting')->get()->count();
		$topContributors    = $dataContributor->orderBy('saldo' , 'desc')->limit(3)->get();

		$contributors = Contributor::where('status' , 'reject')->paginate(5);
		return view('admin.contributor-reject' , [
										'total'           => $totalContributor,
										'waiting'         => $waitingContributor,
										'topContributors' => $topContributors,
										'contributors'    => $contributors,
									]);
	}
		
}
