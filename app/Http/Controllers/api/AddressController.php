<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\AddressService;
use App\Services\CartService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $AddressService;

    public function __construct(AddressService $AddressService = null)
    {
        $this->AddressService = $AddressService ;
    }

    public function find($id){
        return $this->AddressService->find($id);
    }

    public function create(Request $request){
        return $this->AddressService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->AddressService->update($id, $request);
    }

    public function delete($id){
        return $this->AddressService->delete($id);
    }
    public function getByUserId($id){
        return $this->AddressService->getByUserId($id);
    }

}
