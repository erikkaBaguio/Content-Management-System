<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

use App\QueryFilter;

use App\Filterable;

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
        return $this->belongsToMany('App\Http\Models\Category', 'category_item', 'item_id', 'category_id');
    }


    public function getCategoryListAttribute()
    {
        return $this->categories()->lists('id')->all();
    }


    public function filter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

}
