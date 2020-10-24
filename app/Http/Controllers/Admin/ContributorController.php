<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContributorController extends Controller
{
	public function all ( ) 
	{
		return view('admin.contributor-all');
	}

	public function waiting ( ) 
	{
		return view('admin.contributor-waiting');
	}
}
