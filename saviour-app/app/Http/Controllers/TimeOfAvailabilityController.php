<?php

namespace App\Http\Controllers;

use App\TimeOfAvailability;
use Illuminate\Http\Request;

class TimeOfAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(TimeOfAvailability::all());
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
        $slot = new TimeOfAvailability();
        $slot->fill($request->all());

        if($slot->save())
        {
            return response()->json([
                'success' => true,
                'data' => $slot
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
     * @param  \App\TimeOfAvailability  $timeOfAvailability
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $slot = TimeOfAvailability::find($id);
        if($slot)
        {
            return response()->json([
                'success' => true,
                'data' => $slot
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
     * @param  \App\TimeOfAvailability  $timeOfAvailability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $slot = TimeOfAvailability::find($id);
        if($slot){
            $slot->update($request->all());
            if($slot->save())
            {
                return response()->json([
                    'success' => true,
                    'data' => $slot
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Slot not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeOfAvailability  $timeOfAvailability
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $slot = TimeOfAvailability::find($id);
        if($slot->delete())
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
