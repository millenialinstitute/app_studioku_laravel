<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EarningStatistic extends Model
{
    protected $fillable = ['income' , 'studioku' , 'contributor' , 'date' , 'month' , 'year'];
}
