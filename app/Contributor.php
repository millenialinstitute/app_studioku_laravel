<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Item;

class Contributor extends Model
{
    protected $fillable = ['user_id' ,'saldo' , 'status'];

    public function user ( ) 
    {
    	return $this->belongsTo(User::class , 'user_id');
    }

    public function item () 
    {
    	return $this->hasMany(Item::class , 'contributor_id');
    		
    }
}
