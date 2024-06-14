<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'username' => ['required', 'min:3', 'max:50', 'unique:users,username'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        if ($validatedData->fails()) {
            throw new BadRequestException($validatedData->errors()->first());
        }

        $data = $validatedData->validated();
        $data['password'] = Hash::make($data['password']);  // Gunakan Hash::make untuk hashing password
        $user = User::create($data);

        return response()->json([
            'data' => $user,
            'status' => true
        ], 201);
    }


    public function login(Request $request)
    {
        // Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new BadRequestException($validator->errors()->first());
        }


        $user = User::where('username', $request->username)->first();

        if (!isset($user) || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
