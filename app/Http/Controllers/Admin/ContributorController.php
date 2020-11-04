<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contributor;

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
