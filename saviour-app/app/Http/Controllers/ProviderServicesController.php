<?php

namespace App\Http\Controllers;

use App\ProviderServices;
use Illuminate\Http\Request;

class ProviderServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(ProviderServices::all());
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
        $data = new ProviderServices();
        $data->fill($request->all());

        if($data->save())
        {
            return response()->json([
                'success' => true,
                'data' => $data
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
     * @param  \App\ProviderServices  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = ProviderServices::find($id);
        if($data)
        {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Service not found'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProviderServices  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = ProviderServices::find($id);
        if($data){
            $data->update($request->all());
            if($data->save())
            {
                return response()->json([
                    'success' => true,
                    'data' => $data
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Service not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProviderServices  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = ProviderServices::find($id);
        if($data->delete())
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
    }}
