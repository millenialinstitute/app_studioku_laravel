<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\CollectItem;

class Collection extends Model
{
    protected $fillable = ['member_id' , 'name'];

    public function member ( ) 
    {
    	return $this->belongsTo(Member::class , 'member_id');
    }

    public function item () {
    	return $this->hasMany(CollectItem::class , 'collection_id');
    }
    	
}
