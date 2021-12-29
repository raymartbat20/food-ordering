<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Fillable columns on the database
     * 
     * @return array
     */
    protected $fillable = ['customer_name', 'coupon_used', 'payment', 'change', 'tax', 'total', 'total_items'];

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class,'order_id','id');
    }
}
