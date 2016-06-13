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


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);

        $category = new Category;

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        // $category-> = $request->input();
        $category->save();

        return response()->json(['status'=>'OK', 'message'=>'Successfully saved.']);
    }
}
