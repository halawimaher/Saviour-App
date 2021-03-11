<?php

namespace App\Http\Controllers;

use App\ProviderRating;
use Illuminate\Http\Request;

class ProviderRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(ProviderRating::all());
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
        $rating = new ProviderRating();
        $rating->fill($request->all());

        if($rating->save())
        {
            return response()->json([
                'success' => true,
                'data' => $rating
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
     * @param  \App\ProviderRating  $providerRating
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rating = ProviderRating::find($id);
        if($rating)
        {
            return response()->json([
                'success' => true,
                'data' => $rating
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProviderRating  $providerRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rating = ProviderRating::find($id);
        if($rating){
            $rating->update($request->all());
            if($rating->save())
            {
                return response()->json([
                    'success' => true,
                    'data' => $rating
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProviderRating  $providerRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProviderRating $providerRating, $id)
    {
        //
        $rating = ProviderRating::find($id);
        if($rating->delete())
        {
            return response()->json([
                'success' => true,
                'message' => 'Rating successfully deleted'
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ]); 
    }
}
}
