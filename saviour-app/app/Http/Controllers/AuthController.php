<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try{
            $user = User::create([
                'name' => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
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
            'role' => auth()->user()->role_id
        ]);
    }
}