<?php

namespace App\Http\Controllers;

use App\Requestors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RequestorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Requestors::with('feedback')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $requestor = new Requestors();
        $requestor->fill($request->all());

        if($requestor->save())
        {
            return response()->json([
                'success' => true,
                'data' => $requestor
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to create'
                ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requestors  $requestors
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $requestor = Requestors::find($id);
        if($requestor)
        {
            return response()->json([
                'success' => true,
                'data' => $requestor
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requestors  $requestors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $requestors = Requestors::find($id);

        $path = "";
        if ($request->image) {
        $path = Storage::disk('public')->put('', $request->image);
        }
   
        if ($path != "") {
            $requestors->image = $path;
        }

        if($requestors){
            $requestors->update($request->all());
            if($requestors->save())
            {
                return response()->json([
                    'success' => true,
                    'data' => $requestors
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requestors  $requestors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requestors $requestors, $id)
    {
        //
        $requestors = Requestors::find($id);
        if($requestors->delete())
        {
            return response()->json([
                'success' => true,
                'message' => 'Record successfully deleted'
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Record not found'
            ]); 
        }
    }
}
