<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUserDetails(Request $request)
    {
        
    return response()->json(['user' => auth()->user()], 200);
    }
}
