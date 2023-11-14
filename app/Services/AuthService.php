<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

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

    public function update($id, $data){
        return $this->repository->update($id, $data);

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
