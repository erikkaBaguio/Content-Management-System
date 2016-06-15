<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    public function items()
    {
        return $this->belongsTo(Item::class);
    }


    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
