<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Couchbase\User;
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
            return response(['message'=>$validator->messages()->first(), 'data'=> []],422);
        }
        $request->type = 1;
        $request->password = bcrypt($request->password);

        $this->authService->signup($request->all());
        $user = $this->authService->getUser($request->all());
        $token = $user->createToken('auth_token')->plainTextToken;

        if ($token) {
            return response(['message' => 'Register successful', 'token' => $token, 'user' => $user], 200);
        } else {
            return response(['message' => 'Invalid credentials'], 422);
        }
        // $response = $this->authService->signup($request->all());

        // return response(['message' => 'User registered successfully', 'data'=> $response], 200);
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
        $user = $this->authService->getUser($request->all());
        if ($token) {
            return response()->json(['message' => 'Login successful', 'token' => $token, 'user' => $user], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function bussinessAcct(Request $request) {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return response(['message'=>$validator->messages()->first(), 'data'=> []],401);
        }

        $request->type = 3;
        $request->password = bcrypt($request->password);

        $user = $this->authService->bussinessAcct($request->all());
        $token = $user->createToken('auth_token')->plainTextToken;

        if ($token) {
            return response()->json(['message' => 'Bussiness Registered Successful', 'token' => $token, 'user' => $user], 200);
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



    public function updateEmail(Request $request) {
        $user = Auth::user()->id;
        $password = Auth::user()->password;

        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email',
        ]);

        if($this->authService->findByEmail($request->get('newEmail'))){
            return alert('User Alrear Exits');
        }
        else
        {
            if (Auth::attempt(['email' => $user->email, 'password' => $password])) {
                $user = $this->authService->update($user, $request->all());

                return response()->json(['message' => 'Email updated successfully', 'user' => $user], 200);
            }
        }

        if($validator->fails()){
            return response(['message'=>$validator->messages()->first(), 'data'=> []],401);
        }

    }

    public function updateShipping(Request $request) {
        $user = Auth::user()->id;

        $user = $this->authService->updateShipping($user, $request->all());

        return response()->json(['message' => 'Shipping Details updated successfully', 'user' => $user], 200);

    }

    public function updatePassword(Request $request,$id) {

        $result = $this->authService->updatePassword($id, [
            'current_password' => $request->input('current_password'),
            'new_password' => $request->input('new_password'),
        ]);

        if ($result) {
            // Password updated successfully
            return response()->json(['message' => 'Password updated successfully']);
        } else {
            // Handle validation failure or other errors
            return response()->json(['message' => 'Current password is incorrect'], 422);
        }
    }

}
