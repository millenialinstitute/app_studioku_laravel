<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\OwnedItem;
use App\Collection;
use App\Cart;

class Member extends Model
{
    protected $fillable = ['user_id' , 'address' , 'bio' , 'facebook' , 'instagram' , 'twitter'];

    public function user () 
    {
    	return $this->belongsTo(User::class , 'user_id');
    }

    public function collection () 
    {
    	return $this->hasMany(Collection::class , 'member_id');
    }

    public function owned () 
    {
    	return $this->hasMany(OwnedItem::class , 'member_id');
    }

    public function cart () 
    {
        return $this->hasOne(Cart::class , 'member_id');
    }
}
