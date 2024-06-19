<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionBuyLine extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function transaction()
    {
        return $this->belongsTo(\App\Transaction::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Product::class, 'product_id');
    }

    public function variations()
    {
        return $this->belongsTo(\App\Variation::class, 'variation_id');
    }


    public function sell_line_purchase_lines()
    {
        return $this->hasMany(\App\TransactionSellLinesPurchaseLines::class, 'sell_line_id');
    }

    /**
     * Get the quantity column.
     *
     * @param  string  $value
     * @return float $value
     */
    public function getQuantityAttribute($value)
    {
        return (float)$value;
    }

    public function lot_details()
    {
        return $this->belongsTo(\App\PurchaseLine::class, 'lot_no_line_id');
    }

    public function sub_unit()
    {
        return $this->belongsTo(\App\Unit::class, 'sub_unit_id');
    }

    public function order_statuses()
    {
        $statuses = [
            'received',
            'cooked',
            'served'
        ];
    }

    public function service_staff()
    {
        return $this->belongsTo(\App\User::class, 'res_service_staff_id');
    }
}
