<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
use App\Item;

class CartItem extends Model
{
    protected $fillable = ['cart_id' , 'item_id'];

    public function cart () 
    {
    	return $this->belongsTo(Cart::class , 'cart_id');
    }

    public function item () 
    {
    	return $this->belongsTo(Item::class , 'item_id');
    }
    	
    	
}
