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
        // $category = Request::all();
        // Category::create($category);
        // return redirect('categories');

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        $category = new Category($input);

        $category->save();

        Session::flash('flash_message', 'Category successfully added!');

        return redirect()->back();
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
      return view('category.show', compact('category'));
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        $category->fill($input)->save();

        Session::flash('flash_message', 'Category successfully updated!');

        return redirect()->back();
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

       Session::flash('flash_message', 'Category successfully deleted!');
       return back();
   }
}
