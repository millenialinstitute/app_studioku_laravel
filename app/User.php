<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\LevelUser;
use App\Contributor;
use App\Member;
use App\ItemLike;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image' , 'level_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function level ( ) 
    {
        return $this->belongsTo(LevelUser::class , 'level_user_id');
    }

    public function contributor ( ) 
    {
        return $this->hasOne(Contributor::class , 'user_id');
    }

    public function member () {
        return $this->hasOne(Member::class , 'user_id');
    }

    public function likes () 
    {
        return $this->hasMany(ItemLike::class , 'user_id');
    }
        
}
