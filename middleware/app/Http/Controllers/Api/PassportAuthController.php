<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\loginRequest;
use App\Http\Requests\auth\registerRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PassportAuthController extends Controller
{
    /**
     * Create a user account
     *
     * @param \App\Http\Requests\auth\registerRequest $registerRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(registerRequest $registerRequest) :JsonResponse
    {
        $userValidate = $registerRequest->validated();
        $userValidate['password'] = Hash::make($userValidate['password']);
        $user = User::create($userValidate);
        $token = $user->createToken($userValidate['name'])->accessToken;
        $response = [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_at' => null
        ];
        return $this->success($response,
        'User has been register successfully',
        JsonResponse::HTTP_CREATED);//201
    }


    /**
     * login
     *
     * @param \App\Http\Requests\auth\loginRequest $loginRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(loginRequest $loginRequest) :JsonResponse
    {
        $userValidate = $loginRequest->validated();
        if(auth()->attempt($userValidate)){
            $user = auth()->user();
            $token = $user->createToken($user->name)->accessToken;
            $response = [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_at' => null
            ];
            return $this->success($response,
            'Login successfully',
            JsonResponse::HTTP_OK);//200
        }
        return $this->error('Invalid credentials',
        JsonResponse::HTTP_UNAUTHORIZED);//401
    }

    /**
     * logout
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) :JsonResponse
    {
        $request->user()->tokens()->delete();

        return $this->success(null,
        'Logged out successfully'
        ,JsonResponse::HTTP_OK);//200
    }
}
