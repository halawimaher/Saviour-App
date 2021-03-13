<?php

namespace App\Http\Controllers;

use App\ProviderFeedback;
use Illuminate\Http\Request;

class ProviderFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(ProviderFeedback::all());
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
        $feedback = new ProviderFeedback();
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
     * @param  \App\ProviderFeedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $feedback = ProviderFeedback::find($id);
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
     * @param  \App\ProviderFeedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $feedback = ProviderFeedback::find($id);
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
     * @param  \App\ProviderFeedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $feedback = ProviderFeedback::find($id);
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
