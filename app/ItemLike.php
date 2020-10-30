<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\User;


class ItemLike extends Model
{
	protected $fillable = ['item_id' , 'user_id'];

    public function item () {
    	return $this->belongsTo(Item::class , 'item_id');
    }

    public function user () {
    	return $this->belongsTo(User::class , 'user_id');
    }
    	
    	
}
