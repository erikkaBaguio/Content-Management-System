<?php

namespace App\Http\Services;

use App\Http\Models\Item;

use App\Http\Models\Category;

// use Illuminate\Http\Request;

// use App\Http\Requests;

Class RetrieveDataService
{
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }


    public static function itemSearch($field, $input)
    {
        // $input = $this->request->$field;

        $data = Item::with(['categories'=>function($query){
                   $query->select('name');
                }])->where($field, 'like', '%' .$input. '%')
                ->get();

        return $data;
    }


    public static function categorySearch($field, $input)
    {
        // $input = $this->request->$field;

        $data = Category::where($field,'like','%' .$input. '%')->get();

        return $data;
    }
}
