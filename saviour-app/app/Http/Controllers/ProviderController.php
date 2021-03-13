<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Provider::all());
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
        $provider = new Provider();
        $provider->fill($request->all());

        if($provider->save())
        {
            return response()->json([
                'success' => true,
                'data' => $provider
            ]);
            return response()->json([
                'success' => false,
                'message' => 'failed to create'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $requestor = Provider::find($id);
        if($requestor)
        {
            return response()->json([
                'success' => true,
                'data' => $requestor
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'user not found'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $provider = Provider::find($id);
        if($provider){
            $provider->update($request->all());
            if($provider->save())
            {
                return response()->json([
                    'success' => true,
                    'data' => $provider
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
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $providers = Provider::find($id);
        if($providers->delete())
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
