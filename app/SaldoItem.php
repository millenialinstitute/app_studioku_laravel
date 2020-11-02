<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SaldoStatistic;
use App\Item;

class SaldoItem extends Model
{
   protected $fillable = ['saldo_id' , 'item_id' , 'cost'];

   public function saldo () 
   {
   		return $this->belongsTo(SaldoStatistic::class , 'saldo_id');
   }

   public function item () 
   {
   		return $this->belongsTo(Item::class , 'item_id');
   			
   }	
}
