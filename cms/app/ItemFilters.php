<?php

namespace App;

use App\Http\Models\Item;

class ItemFilters extends QueryFilter
{
    public function name()
    {
        $data = with(['categories'=>function($query){
    			   $query->select('name');
               }])->where('name', 'like', '%' .$input. '%');
    			// ->get();

        return $this->builder->orderBy('views','desc');
    }


    // public function description($input)
    // {
    //     $data = Item::with(['categories'=>function($query){
    // 			   $query->select('name');
    // 		   }])->where('description', 'like', '%' .$input. '%');
    // 			// ->get();
    //
    //     return $this->builder->$data;
    // }
    //
    //
    // public function unit_cost($input)
    // {
    //     $data = Item::with(['categories'=>function($query){
    // 			   $query->select('name');
    // 		   }])->where('unit_cost', 'like', '%' .$input. '%');
    // 			// ->get();
    //
    //     return $this->builder->$data;
    // }
    //
    //
    // public function created_at($input)
    // {
    //     $data = Item::with(['categories'=>function($query){
    // 			   $query->select('name');
    // 		   }])->where('created_at', 'like', '%' .$input. '%');
    // 			// ->get();
    //
    //     return $this->builder->$data;
    // }
    //
    //
    // public function updated_at($input)
    // {
    //     $data = Item::with(['categories'=>function($query){
    // 			   $query->select('name');
    // 		   }])->where('updated_at', 'like', '%' .$input. '%');
    // 			// ->get();
    //
    //     return $this->builder->$data;
    // }
}
