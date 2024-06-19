<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ElectronicBill extends Model
{
    protected $fillable = ['api_username', 'business_id', 'api_password','api_supplier', 'api_baseUrl'];
}
