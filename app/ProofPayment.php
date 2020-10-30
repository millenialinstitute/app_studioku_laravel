<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\Cart;

class ProofPayment extends Model
{
    protected $fillable = [ 'bank_id' , 'member_id' , 'cart_id' , 'total' , 'bank' , 'customer' , 'card_number' , 'proof_file'];

    public function member () 
    {
    	return $this->belongsTo(Member::class , 'member_id');
    }

    public function cart () 
    {
    	return $this->belongsTo(Cart::class , 'cart_id');
    }
}
