<?php

namespace App\Http\Controllers;

use App\Http\Models\Item;

use App\Http\Models\Category;

use Session;

use Validator;

use App\Http\Services\ResponseService;

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
        $data = Item::with(['categories'=>function($query){
                    $query->select('name');
                }])->get();

        // $data = Item::where('name','=','ok')->get();

        if (count($data) === 0) {
                $response = ['error' => [
                    "http_code" => 200,
                    "response_msg" => "No data found.",
                    "response_code" => "NO_DATA_FOUND",
                    "exception" => "No items found."
                    ]
                ];

                $data = ['error'=> $response['error']['exception']];
                $message = $response['error']['response_msg'];
                $message_code = $response['error']['response_code'];

                return ResponseService::success($message, $data, 200, $message_code);
                
        }else{
            $response =  ['items'=> $data];
            return ResponseService::success('Here\'s the following items', $response);
        }


   }
   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
       $categories = Category::lists('name', 'id');
       return view('item.create', compact('categories'));
   }
   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request $request)
   {
    //    dd($request->input('categories'));

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'unit_cost'=> 'required',
        ]);

        if (!$validator->fails())
        {
            $item = Item::create($request->all());

            $item->categories()->attach($request->input('categories'));

            $item->save();

            $response = ['item' => $item];
            return ResponseService::success('INSERT_SUCCEEDED', $response, 200, 'Item Successfully Inserted.');
        }
        else
        {
            $response = ['item' => $validator->errors()];
            return ResponseService::success('INSERT_FAILED', $response, 400, 'Item Insertion Failed.');
        }

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

      $response = ['item' => $item];
      return ResponseService::success('Here\'s the item', $response);
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
      $categories = Category::lists('name', 'id');

      return view('item.edit', compact('item','categories'));
   }
   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'unit_cost'=> 'required',
        ]);

        if (!$validator->fails())
        {
            $item = Item::findOrFail($id);
            $item->categories()->attach($request->input('categories'));

            $item->update($request->all());

            $response = ['item' => $item];
            return ResponseService::success('UPDATE_SUCCEEDED', $response, 200, 'Item Successfully Updated.');
        }
        else
        {
            $response = ['item' => $validator->errors()];
            return ResponseService::success('UPDATE_FAILED', $response, 400, 'Failed To Update Item.');
        }

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

       $response = ['item' => $item, 'status' => 'Deleted item.'];
       return ResponseService::success('DELETE_SUCCEEDED', $response, 200, 'Item Successfully Deleted.');
   }
}
