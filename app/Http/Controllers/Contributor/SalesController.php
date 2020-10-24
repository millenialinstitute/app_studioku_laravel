<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index ( ) 
    {
    	return view('contributor.sales');
    }
}
