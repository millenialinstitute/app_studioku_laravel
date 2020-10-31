<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\Item;

class OwnedItem extends Model
{
    protected $fillable = ['member_id' , 'item_id'];

    public function member () 
    {
    	return $this->belongsTo(Member::class , 'member_id');
    }

    public function item () 
    {
    	return $this->belongsTo(Item::class , 'item_id');
    }
}
