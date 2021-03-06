<?php

namespace App\Http\Controllers;

use App\Http\Models\Category;

use Illuminate\Http\Request;

use App\Http\Services\ResponseService;

use App\Http\Requests;

use Validator;

use App\Http\Controllers\Controller;

use App\Http\Services\RetrieveDataService;


class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index(Request $request)
   {
        $data = Category::all();

        try {

            if ($request->exists('q'))
            {
                $input = $request->q;

                $dataCount = Category::where('name', 'like', '%' .$input. '%')
                        ->orWhere('created_at', 'like', '%' .$input. '%')
                        ->orWhere('updated_at', 'like', '%' .$input. '%')
                        ->count();

                if($dataCount != 0)
                {
                    $data = Category::where('name', 'like', '%' .$input. '%')
                            ->orWhere('created_at', 'like', '%' .$input. '%')
                            ->orWhere('updated_at', 'like', '%' .$input. '%')
                            ->get();

                }else{
                    $data = null;
                }
            }



            if ($request->only('name', 'created_at', 'updated_at'))
            {
                $name = $request->name;
                $created_at = $request->created_at;
                $updated_at = $request->updated_at;

                if ($name)
                {
                    $field = 'name';
                    $input = $name;
                }
                if ($created_at)
                {
                    $field = 'created_at';
                    $input = $created_at;
                }
                if ($updated_at)
                {
                    $field = 'updated_at';
                    $input = $updated_at;
                }

                $data = RetrieveDataService::categorySearch($field, $input);
            }

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

                $response = ['categories' => $data];
                return ResponseService::success('Here\'s the following categories', $response);
            }

        } catch (\Exception $e) {
            $response = ['error' => [
             "http_code" => 400,
             "response_msg" => "UNDEFINED",
             "response_code" => "UNDEFINED",
             "exception" =>"NO DATA"
             ]
            ];

            $data = ['error'=> $response['error']['exception']];
            $message = $response['error']['response_msg'];
            $message_code = $response['error']['response_code'];

            return ResponseService::error($message, $data, 400, $message_code);
        }

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
    //    dd($request->all());

        // $validation = $this->validate($request, [
        //     'name' => 'required',
        // ]);

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3'
        ]);

        if(!$validator->fails())
        {
            $category = Category::create($request->all());

            $response = ['category'=>$category];
            return ResponseService::success("INSERT_SUCCEEDED", $response, 200, "Category Successfully Inserted.");

        }else{

            $response = ['error' => $validator->errors()];
            return ResponseService::error("INSERT_FAILED", $response, 400, "Category Insertion Failed.");
        }

        $input = $request->all();

        $category = new Category($input);

        $category->save();

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

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3'
        ]);

        if(!$validator->fails())
        {
            $category->update($request->all());

            $response = ['category' => $category];
            return ResponseService::success('UPDATE_SUCCEEDED', $response, 200, 'Category Successfully Updated.');
        }else
        {
            $response = ['errors' => $validator->errors()];
            return ResponseService::error('UPDATE_FAILED', $response, 400, 'Failed To Update Category.');
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
       $category = Category::findOrFail($id);
       $category->delete();

       $response = ['category' => $category, 'status' => 'Deleted category'];
       return ResponseService::success('DELETE_SUCCEEDED', $response, 200, 'Category Successfully Deleted.');
   }
}
