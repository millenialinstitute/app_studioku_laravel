<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\Tag;

class ItemTag extends Model
{
    protected $fillable = ['item_id' , 'tag_id'];

    public function item ( ) 
    {
    	return $this->belongsTo('item_id');
    }

    public function tag ( ) 
    {
    	return $this->belongsTo('tag_id');
    }
}
