<?php

namespace App\Services;

use App\Repositories\AddProductRepository;
use App\Repositories\AuthRepository;
use App\Repositories\ProductRepository;
use App\Repositories\VehicleRepository;
use Illuminate\Support\Facades\Auth;

class AddProductService
{
    protected $repository;


    public function __construct(AddProductRepository $repository = null)
    {
        $this->repository = $repository;
    }

    public function find($id){
        return $this->repository->find($id);
    }

    public function create($request){
        if(!empty($request['total_images'])){
            $ar_img = array();
            $re = '/image[0-9]+/m';
            foreach ($request as $req=>$k){
                $c= preg_match($re,$req,$n);
                if(!empty($n))
                    $ar_img[] = [$req => $k];
            }
            $img = json_encode($ar_img);
        }
        else{
            $img = '';
        }
        $request['images'] = $img;
        return $this->repository->create($request);
    }

    public function update($id, $data){
        return $this->repository->update($id, $data);

    }

    public function delete($id){
        return $this->repository->delete($id);

    }
}
