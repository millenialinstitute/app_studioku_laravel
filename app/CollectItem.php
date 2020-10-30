<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Collection;
use App\Item;

class CollectItem extends Model
{
    protected $fillable = ['collection_id' , 'item_id'];

    public function collection () 
    {
    	return $this->belongsTo(Collection::class , 'collection_id');
    }

    public function item ( ) 
    {
    	return $this->belongsTo(Item::class , 'item_id');
    }
}
