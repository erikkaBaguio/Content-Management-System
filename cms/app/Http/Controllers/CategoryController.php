<?php

namespace App\Http\Controllers;

use App\Http\Models\Category;

use Illuminate\Http\Request;

use App\Http\Services\ResponseService;

use App\Http\Requests;

use Session;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index()
   {
       $data = Category::all();

       $response = ['categories' => $data];
       return ResponseService::success('Here\'s the following categories', $response);
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
      return view('category.create');
   }
   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request $request)
   {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $category = new Category($input);

        $category->save();

        $response = ['category'=>$category];
        return ResponseService::success("INSERT_SUCCEEDED", $response, 200, "Category Successfully Inserted.");
   }
   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {
      $category = Category::find($id);

      $response = ['category' => $category];
      return ResponseService::success('Here\'s the category', $response);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
      $category = Category::find($id);
      return view('category.edit', compact('category'));
   }
   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $input = $request->all();

        $category->fill($input)->save();

        $response = ['category'=>$category];
        return ResponseService::success('UPDATE_SUCCEEDED', $response, 200, 'Category Successfully Updated.');
    }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
       $category = Category::findOrFail($id);
       $category->delete();

       $response = ['category' => $category, 'status' => 'Deleted category'];
       return ResponseService::success('DELETE_SUCCEEDED', $response, 200, 'Category Successfully Deleted.');
   }
}
