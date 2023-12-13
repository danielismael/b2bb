<?php

namespace App\Http\Controllers\UserDealer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthUserDealerController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('dealer')->attempt($credentials)) {
            return response()->json([
               'status' => 403,
               'message' => 'Username or password does not match.'
            ], 403);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Successful login. Welcome!',
            'token' => $token
        ]);
    }
}
