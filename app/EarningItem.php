<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EarningStatistic;
use App\Item;

class EarningItem extends Model
{
    protected $fillable = ['statistic_id' , 'item_id'];

    public function statistic () 
    {
    	return $this->belongsTo(EarningStatistic::class , 'statistic_id');
    }

    public function item () 
    {
    	return $this->belongsTo(Item::class , 'item_id');
    		
    }
}
