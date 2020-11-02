<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProofPayment;

class PaymentController extends Controller
{
    public function index () 
    {
    	$memberId = Auth::user()->member->id;
    	$payments = ProofPayment::where('member_id' , $memberId)->latest()->get();

    	return view('member.payment' , [
    								'user' => Auth::user(),
    								'payments' => $payments,
					    	]);
    }
}
