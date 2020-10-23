<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Member extends Model
{
    protected $fillable = ['user_id' , 'address' , 'bio' , 'facebook' , 'instagram' , 'twitter'];

    public function user () 
    {
    	return $this->belongsTo(User::class , 'user_id');
    }
}
