<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class ItemFile extends Model
{
    protected $fillable = ['item_id' , 'name' , 'size' , 'extension' , 'type'];

    public function item ( ) 
    {
    	return $this->belongsTo(Item::class , 'item_id');
    }
}
