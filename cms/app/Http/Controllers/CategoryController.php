<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json(['status'=>'OK', 'data'=>$categories, 'message'=>'Successfully retrieve categories.']);
    }


    public function show(Category $category)
    {
        return response()->json(['status'=>'OK', 'data'=>$category, 'message'=>'Successfully retrieve category.']);
    }
}
