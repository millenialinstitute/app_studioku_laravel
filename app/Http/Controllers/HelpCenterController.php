<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemReject;

class HelpCenterController extends Controller
{
	/**
	  * route: /help
	  * method: get
	  * params: null
	  * description: 
	    * this method for display menu help center
	  * return : view
	*/
		
    public function index () 
    {
    	return view('help.index');
    }


    
    
    /**
      * route: /help/account
      * method: get
      * params: null
      * description: 
        * this methot for display about account
      * return : @view
    */
    public function account () 
    {
    	return view('help.account');
    }
    	


    
    /**
      * route: /help/requirements
      * method: get
      * params: null
      * description: 
        * this method for display requirements item
      * return : @view
    */

    public function requirements () 
    {
    	return view('help.requirements');
    }


    
    
    /**
      * route: /help/upload
      * method: get
      * params: null
      * description: 
        * this method for display upload procedure
      * return : @view
    */
    public function upload () 
    {
    	return view('help.upload');
    }
    	
    	



    
    
    /**
      * route: /help/reject
      * method: get
      * params: null
      * description: 
        * this method for display list reject item reason
      * return : @view
    */
    public function reject () 
    {
    	$reasons = ItemReject::get();
    	return view('help.reject' , [ 'reasons' => $reasons ]);
    }


    
    
    /**
      * route: /help/payment
      * method: get
      * params: null
      * description: 
        * this method for display procedure payment
      * return : @view
    */
    public function payment () 
    {
    	return view('help.payment');
    }
    	


    
    
    /**
      * route: /help/contact
      * method: get
      * params: null
      * description: 
        * this method for display view contact
      * return : @view
    */
    public function contact () 
    {
    	return view('help.contact');
    }
    	
    	
}
