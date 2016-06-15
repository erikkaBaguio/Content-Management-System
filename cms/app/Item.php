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


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'item_categories', 'item_id', 'category_id');
    }

}
