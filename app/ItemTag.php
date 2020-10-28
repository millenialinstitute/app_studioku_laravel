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
    	return $this->belongsTo(Item::class , 'item_id');
    }

    public function tag ( ) 
    {
    	return $this->belongsTo(Tag::class , 'tag_id');
    }
}
