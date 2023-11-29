<?php

namespace App\Repositories;

use App\Models\product;

class ProductRepository
{
    protected $model;


    public function __construct(product $model = null)
    {
        $this->model = $model;
    }

    public function find($id){
        return $this->model->find($id);
    }
    // public function getProductsBySubCategory($subcategory) {
    //     return Product::with('get_sub_category')
    //         ->where('sub_category_id', $subcategory)
    //         ->get();
    // }

    public function getAllProducts() {
        return product::all();
     }

    public function create($request){
       return $this->model->create($request);
    }

    public function update($id, $data){
        $this->model->find($id)->update($data->all());
        return $this->model->find($id);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }
    public function search($query){
        if($query == 'all')
            return $this->model->all();
        return $this->model->where('part_number', 'like', "%$query%")
            ->orWhere('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();;
    }
}
