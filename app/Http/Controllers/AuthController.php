<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);
        // this is just comment
        $user = User::where('email', $request->email)->first();
        //$otp_code = random_int(100000, 999999);
        //$user->(['otp_code' => $otp_code])->save();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' =>  "Invalid Email or Password",
            ], 422);
        }
        $token = $user->createToken('web')->plainTextToken;
        return response()->json([
            'message' =>  "Login Successfully",
            'user' => $user,
            'token' => $token
        ], 200);
    }
    public function register(Request $request) {
        $validated_data = $request->validate([
           'email' => 'required|email|unique:users',
           'password' => 'required|confirmed',
            'name' => 'required'
        ]);
        $validated_data['password'] = Hash::make($request->password);
        $user = User::create($validated_data);
        $token = $user->createToken('web')->plainTextToken;
        return response()->json([
            'message' =>  "Registered Successfully",
            'user' => $user,
            'token' => $token
        ], 200);
    }
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'logout successfully',

        ],200);
    }

}
