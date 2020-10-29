<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\ItemReject;

class ManageReject extends Model
{
    protected $fillable = ['item_id' , 'reject_id'];

    public function item ( ) 
    {
    	return $this->belongsTo(Item::class , 'item_id');
    }

    public function reject ( ) 
    {
    	return $this->belongsTo(ItemReject::class , 'reject_id');
    }
}
