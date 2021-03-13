<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Booking::all());
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
        $booking = new Booking();
        $booking->fill($request->all());

        if($booking->save())
        {
            return response()->json([
                'success' => true,
                'data' => $booking
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
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $booking = Booking::find($id);
        if($booking)
        {
            return response()->json([
                'success' => true,
                'data' => $booking
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Booking not found'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $booking = Booking::find($id);
        if($booking){
            $booking->update($request->all());
            if($booking->save())
            {
                return response()->json([
                    'success' => true,
                    'data' => $booking
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $booking = Booking::find($id);
        if($booking->delete())
        {
            return response()->json([
                'success' => true,
                'message' => 'Booking successfully cancelled'
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ]); 
        }
    }
}
