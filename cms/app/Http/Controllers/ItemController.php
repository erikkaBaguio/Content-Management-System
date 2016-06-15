<?php

namespace App\Http\Controllers;

use App\Item;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index()
   {
       $items = Item::all();
       return view('item.index',compact('items'));
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
      return view('item.create');
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
            'description' => 'required',
            'unit_cost'=> 'required'
        ]);

        $input = $request->all();

        $item = new Item($input);

        $item->save();

        Session::flash('flash_message', 'Item successfully added!');

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
      $item = Item::find($id);
      return view('item.show', compact('item'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
      $item = Item::find($id);
      return view('item.edit', compact('item'));
   }
   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update($id, Request $request)
    {
        $item = Item::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'unit_cost' => 'required'
        ]);

        $input = $request->all();

        $item->fill($input)->save();

        Session::flash('flash_message', 'Item successfully updated!');

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
       $item = Item::findOrFail($id);
       $item->delete();

       Session::flash('flash_message', 'Item successfully deleted!');
       return back();
   }
}
