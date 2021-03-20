<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Service::with('providers')->get());
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
                //
                $service = new Service();
                $service->fill($request->all());
        
                if($service->save())
                {
                    return response()->json([
                        'success' => true,
                        'data' => $service
                    ]);
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to create service'
                        ]);
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $service = Service::find($id);
        if($service)
        {
            return response()->json([
                'success' => true,
                'data' => $service
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
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $service = Service::find($id);
        if($service){
            $service->update($request->all());
            if($service->save())
            {
                return response()->json([
                    'success' => true,
                    'data' => $service
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
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
                //
                $service = Service::find($id);
                if($service->delete())
                {
                    return response()->json([
                        'success' => true,
                        'message' => 'Service successfully deleted'
                    ]);
                    return response()->json([
                        'success' => false,
                        'message' => 'Service not found'
                    ]); 
                }
    }
}
