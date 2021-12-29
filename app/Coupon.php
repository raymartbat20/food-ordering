<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * Fillable columns on the database
     * 
     * @return array
     */
    protected $fillable = ['code','discount'];
}
