<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    use ApiResponse;
    public function loggedIn(UserRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->message('Invalid credentials', 401);
        }

        $user = User::firstWhere('email', $request->email);

        $userToken = [
            'token' => $user->createToken('Api token for' . $user['email'], ['*'], now()->addMonth())->plainTextToken
        ];
        return $this->message('Logged in successfully', 200, $userToken);
    }


    public function registered(UserRequest $request)
    {

        if (User::where('email', $request->email)->exists()) {
            return $this->message('Email already exists', 409);
        }
        User::create($request->validated());

        return $this->message('Registered successfully', 200);
    }
    public function logout(Request $request){

        // dd($request->user());
        $request -> user()
                 -> currentAccessToken() 
                 -> delete();

        return $this->message('Logged out successfully', 200);
    }
}
