<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): Response
    {
        $user = User::create($request->validated());

        return response($user);
    }

    public function login(LoginRequest $request): Response
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response(['message' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;

        return response(['jwt' => $token]);
    }

    public function logout(): Response
    {
        auth()->user()->currentAccessToken()->delete();

        return response(['message' => 'Logged out']);
    }
}
