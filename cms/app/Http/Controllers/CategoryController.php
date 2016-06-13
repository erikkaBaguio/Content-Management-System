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


    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        $category = new Category($input);

        // $category->name = $request->input('name');
        // $category->description = $request->input('description');
        // $category-> = $request->input();
        $category->save();

        return response()->json(['status'=>'OK', 'message'=>'Successfully saved.']);
    }


    public function show(Category $category)
    {
        return response()->json(['status'=>'OK', 'data'=>$category, 'message'=>'Successfully retrieve category.']);
    }


    public function edit($id)
   {
      //
   }


   public function update($id)
   {
      //
   }


   public function destroy($id)
   {
      //
   }


}
