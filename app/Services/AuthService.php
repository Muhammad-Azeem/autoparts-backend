<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $repository;


    public function __construct(AuthRepository $repository = null)
    {
        $this->repository = $repository;
    }

    public function signup($request){
        return $this->repository->create($request);
    }

    public function login(array $credentials) {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return $token;
        }

        return null;
    }

    public function bussinessAcct($request){
        return $this->repository->create($request);
    }

    public function update($id, $data){
        return $this->repository->update($id, $data);

    }
    public function updateShipping($id, $data){
        return $this->repository->updateShipping($id, $data);
    }

    public function updatePassword($id, $data){
        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            // User not found
            return false;
        }

        // Validate the current password
        if (!Hash::check($data['current_password'], $user->password)) {
            // Current password doesn't match
            return false;
        }

        // Update the password
        $user->password = Hash::make($data['new_password']);
        $user->save();

        return true;
    }

    public function getUser(array $credentials) {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return $user;
        }
        return null;
    }

    public function findByEmail($email){
        return $this->repository->findByEmail($email);
    }
}
