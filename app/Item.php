<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contributor;
use App\Category;
use App\ItemTag;

class Item extends Model
{
    protected $fillable = ['contributor_id' , 'title' , 'image' , 'category_id' , 'cost' , 'status'];

    public function contributor ( ) 
    {
    	return $this->belongsTo(Contributor::class , 'contributor_id');
    }

    public function category ( ) 
    {
    	return $this->belongsTo(Category::class , 'category_id');
    }

    public function tag ( ) 
    {
    	return $this->hasMany(ItemTag::class , 'item_id');
    }
}
