<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\CartItem;

class Cart extends Model
{
    protected $fillable = ['member_id'];

    public function member () 
    {
    	return $this->belongsTo(Member::class , 'member_id');
    }

    public function item () 
    {
    	return $this->hasMany(CartItem::class , 'cart_id');
    }
}
