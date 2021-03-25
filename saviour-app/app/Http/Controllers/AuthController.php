<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allRequestors()
    {
        //
        return response()->json(User::withCount('requestorFeedback', 'requestorBookings')->with('requestorFeedback','requestorBookings', 'services')->where('role_id', '=', '3')->get());
    }

    public function allProviders()
    {
        //
        return response()->json(User::withCount('providerFeedback', 'providerBookings')->with('providerFeedback', 'providerBookings', 'services')->where('role_id', '=', '2')->get());
    }

    public function showRequestor($id)
    {
        //
        $requestor = User::withCount('requestorFeedback', 'requestorBookings')->with('requestorFeedback', 'requestorBookings', 'services')->where('role_id', '=', '3')->find($id);
        if($requestor)
        {
            return response()->json([$requestor]);
        }
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ]);
    }

    public function showProvider($id)
    {
        //
        $provider = User::withCount('providerFeedback', 'providerBookings')->with('providerFeedback', 'providerBookings', 'services')->where('role_id', '=', '2')->find($id);
        if($provider)
        {
            return response()->json([$provider]);
        }
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ]);
    }

    public function register(Request $request)
    {
        try{
            $user = User::create([
                'name' => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'city' => $request->city,
                'image' => $request->image,
                'address' => $request->address,
                'personal_message' => $request->personal_message,
                'role_id' => $request->role_id
            ]);
   
           $token = auth()->login($user);
   
           return $this->respondWithToken($token);
        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Sorry, this user already exists!'
            ], 400);
        }

    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'role_id' => auth()->user()->role_id,
            'user_id' => auth()->user()->id
        ]);
    }
}