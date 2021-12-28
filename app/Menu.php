<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * Fillable columns on the database
     * 
     * @return array
     */
    protected $fillable = ['name', 'price', 'tax', 'category_id'];
}
