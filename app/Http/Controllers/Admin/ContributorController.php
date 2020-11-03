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
		$totalContributor = Contributor::where('status' , 'confirmed')->get()->count();
		$waitingContributor = Contributor::where('status' , 'waiting')->get()->count();

		$topContributors = Contributor::orderBy('saldo' , 'desc')->limit(3)->get();
		$contributors = Contributor::latest()->paginate(5);
		return view('admin.contributor-all' , [
										'total' => $totalContributor,
										'waiting' => $waitingContributor,
										
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
		return view('admin.contributor-waiting');
	}
}
