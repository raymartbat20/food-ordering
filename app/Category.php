<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * Fillable columns on the database
     * 
     * @return array
     */
    protected $fillable = ['name'];

    public function getCategoryNameAttribute()
    {
        return Str::of(str_replace('_',' ',$this->name))->upper();
    }
}
