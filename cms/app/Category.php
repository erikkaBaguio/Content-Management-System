<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable=['name'];

    /**
    *Get the items associated with the given category.
    *
    *@return Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'category_item', 'category_id', 'item_id');
    }
}
