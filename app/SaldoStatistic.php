<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contributor;
use App\SaldoItem;

class SaldoStatistic extends Model
{
    protected $fillable = ['contributor_id' , 'total' , 'date' , 'month' , 'year'];

    public function contributor () 
    {
    	return $this->belongsTo(Contributor::class , 'contributor_id');
    }

    public function item () 
    {
    	return $this->hasMany(SaldoItem::class , 'saldo_id');
    }
}
