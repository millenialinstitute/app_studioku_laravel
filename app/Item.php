<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contributor;
use App\Category;
use App\ManageReject;
use App\ItemTag;
use App\ItemFile;
use App\CollectItem;
use App\ItemLike;
use App\CartItem;
use App\OwnedItem;

class Item extends Model
{
    protected $fillable = ['contributor_id' , 'title' , 'image' , 'category_id' , 'cost' , 'status' , 'sold'];

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

    public function reject ( ) 
    {
        return $this->hasMany(ManageReject::class , 'item_id');
    }

    public function file ( ) 
    {
        return $this->hasMany(ItemFile::class , 'item_id');
    }

    public function collection () 
    {
        return $this->hasMany(CollectItem::class , 'item_id');
    }

    public function like () 
    {
        return $this->hasMany(ItemLike::class , 'item_id');
    }

    public function cart () 
    {
        return $this->hasMany(CartItem::class , 'item_id');
    }

    public function owned () 
    {
        return $this->hasMany(OwnedItem::class , 'item_id');
    }
}
