<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class LevelUser extends Model
{
    protected $fillable = ['level_user'];

    public function user ( ) 
    {
    	return $this->hasMany(User::class , 'level_user_id');
    }
}
