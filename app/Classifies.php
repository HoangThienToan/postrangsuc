<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Classifies extends Model
{
    protected $fillable = ['commodities', 'business_id','purchase', 'sell'];
}
