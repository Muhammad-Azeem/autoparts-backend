<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    protected $authService;


    public function __construct(AuthService $authService = null)
    {
        $this->authService = $authService;
    }


    /**
     * Register
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        if($validator->fails()){
            return response(['message'=>$validator->messages()->first(), 'data'=> []],401);
        }
        $request->type = 1;
        $request->password = bcrypt($request->password);

        $response = $this->authService->signup($request->all());

        return response(['message' => 'User registered successfully', 'data'=> $response], 200);
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return response(['message'=>$validator->messages()->first(), 'data'=> []],401);
        }
        $token = $this->authService->login($request->all());

        if ($token) {
            return response()->json(['message' => 'Login successful', 'token' => $token], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function update(Request $request) {
        $user = Auth::user()->id;
        $validator = Validator::make($request->all(),[
            'job_title' => 'nullable|string',
            'business_type' => 'nullable|string',
            'business_name' => 'nullable|string',
            'business_phone_number' => 'nullable|string',
            'business_address1' => 'nullable|string',
            'business_address2' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'city' => 'nullable|string',
        ]);
        if($validator->fails()){
            return response(['message'=>$validator->messages()->first(), 'data'=> []],401);
        }
        $user = $this->authService->update($user, $request->all());

        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }
}
