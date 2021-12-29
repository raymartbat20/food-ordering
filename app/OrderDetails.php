<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    /**
     * Fillable columns on the database
     * 
     * @return array
     */
    protected $fillable = ['order_id', 'menu_id', 'qty'];

    /**
     * Relationship for menu table
     * 
     */
    public function menu()
    {
        return $this->hasOne(Menu::class,'id','menu_id');
    }
}
