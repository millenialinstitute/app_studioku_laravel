<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Category extends Model
{
    protected $fillable = ['name'];

    public function item ( ) 
    {
    	return $this->hasMany(Item::class , 'category_id');
    }
}
