<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function itemCategories()
    {
        return $this->hasMany(ItemCategory::class);
    }
}
