<?php

namespace App;

use Illuminate\Http\Request;

// use App\Http\Requests;

abstract class QueryFilter
{
    protected $request;
    protected $builder;

     public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Apply the filters to the builder.
     *
     * @param  Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        foreach ($this->filters() as $name => $value) {
            if (! method_exists($this, $name)) {
                continue;
            }
            if (strlen($value)) {
                $this->$name($value);
            } else {
                $this->$name();
            }
        }
        return $this->builder;
    }
    /**
     * Get all request filters data.
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->all();
    }


    // public function __construct(Request $request)
    // {
    //     $this->request = $request;
    // }
    //
    //
    // public function apply(Builder $builder)
    // {
    //     $this->builder = $builder;
    //
    //     foreach($this->filters() as $name => $value)
    //     {
    //         if (method_exists($this,$name))
    //         {
    //             call_user_func_array([$this,$name], array_filter([$value]));
    //         }
    //     }
    //
    //     return $this->builder;
    // }
    //
    // //accessing filters
    // public function filters()
    // {
    //     $this->request->all();
    // }
}
