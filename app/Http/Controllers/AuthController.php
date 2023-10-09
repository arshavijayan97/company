<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if (!$user->api_token) {
                $apiToken = base64_encode(random_bytes(40)); // Generate a random API token
                $user->api_token = $apiToken;
                $user->save();
            }
    
            return response()->json(['api_token' => $user->api_token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    
}
