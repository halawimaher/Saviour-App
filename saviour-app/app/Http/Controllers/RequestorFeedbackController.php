<?php

namespace App\Http\Controllers;

use App\RequestorFeedback;
use Illuminate\Http\Request;

class RequestorFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(RequestorFeedback::all());
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
        $feedback = new RequestorFeedback();
        $feedback->fill($request->all());

        if($feedback->save())
        {
            return response()->json([
                'success' => true,
                'data' => $feedback
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to send feedback'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestorFeedback  $requestorFeedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $feedback = RequestorFeedback::find($id);
        if($feedback)
        {
            return response()->json([
                'success' => true,
                'data' => $feedback
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Feedback not found'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestorFeedback  $requestorFeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $feedback = RequestorFeedback::find($id);
        if($feedback){
            $feedback->update($request->all());
            if($feedback->save())
            {
                return response()->json([
                    'success' => true,
                    'data' => $feedback
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Feedback not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestorFeedback  $requestorFeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $feedback = RequestorFeedback::find($id);
        if($feedback->delete())
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
