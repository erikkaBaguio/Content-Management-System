<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'name',
        'description',
        'unit_cost'
    ];


    /**
    *Get the categories associated with the given item.
    *
    *@return Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_item', 'item_id', 'category_id');
    }


    public function getCategoryListAttribute()
    {
        return $this->categories->lists('id')->all();
    }

}
