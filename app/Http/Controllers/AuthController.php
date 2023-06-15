<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except'=>['login','register']]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|string|email|enique::users',
            'password'=>'required|string|confirmed|min:6'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        return response()->json([
            'message'=>'User successfully registered',
            'user'=>$user
        ],201);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        // Generate a new API token for the authenticated user if using Laravel Sanctum or Passport
        // $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'User successfully logged in',
            'user' => $user,
            // 'token' => $token, // Include the generated API token if using Laravel Sanctum or Passport
        ], 200);
    }

    return response()->json([
        'message' => 'Invalid credentials',
    ], 401);
     }
}
