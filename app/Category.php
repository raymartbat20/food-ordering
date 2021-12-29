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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['category_name'];

    public function getCategoryNameAttribute()
    {
        return strtoupper(str_replace('_',' ',$this->name));
    }

    /**
     * Relationship for menus
     * 
     * @return Collection
     */
    public function menus()
    {
        return $this->hasMany(Menu::class,'category_id','id');
    }
}
