<?php

namespace App\Repositories;

use App\Models\address;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    protected $model;


    public function __construct(User $model = null)
    {
        $this->model = $model;
    }

    public function create($request){
       return $this->model->create($request);
    }

    public function update($id, $data){
        $this->model->find($id)->update($data);
        return $this->model->find($id);
    }

    public function updateShipping($id, $data){
        $this->model->find($id)->update(['business_phone_number'=> $data['business_phone_number'], 'zip_code' => $data['zip_code']]);
        $address = new address();
        $address->user_id = $id;
        $address->country = $data['country'];
        $address->first_name = $data['first_name'];
        $address->last_name = $data['last_name'];
        $address->company = $data['company'];
        $address->city = $data['appartment'];
        $address->address_1 = $data['address'];;
        $address->save_as = $data['save_as'];
        $address->is_default = 1;
        $address->save();
        return $this->model->find($id);
    }

    public function findByEmail($email){
        return $this->model->where(['email' => $email])->first();
    }
}
