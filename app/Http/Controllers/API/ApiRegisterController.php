<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Illuminate\Support\Facades\Validator;

class ApiRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'firstName' => $request->post('firstName'),
            'middleName'  => $request->post('middleName'),
            'password' => bcrypt($request->post('password')),
            'surname' => $request->post('surname'),
            'role' => $request->post('role'),
            'is_changed' => false,
        ]);

        $user = User::first();
        $token = JWTAuth::fromUser($user);

        return Response::json([
            'error' => false,
            'message' => 'user created',
            'user' => $user,
            'access_token' => $token,
        ], 200);
    }
}
