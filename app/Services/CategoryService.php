<?php

namespace App\Services;

use App\Models\category;
use App\Models\product;
use App\Models\subCategory;
use App\Repositories\AuthRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    protected $repository;


    public function __construct(CategoryRepository $repository = null)
    {
        $this->repository = $repository;
    }

    public function find($id){
        return $this->repository->find($id);
    }
    public function getAllCategories() {
        return $this->repository->getAllCategories();
    }


    public function create($request){
        return $this->repository->create($request);
    }

    public function update($id, $data){
        return $this->repository->update($id, $data);

    }

    public function delete($id){
        return $this->repository->delete($id);

    }
    public function getAllProductsByCategory(){
        $categories = category::all();
        foreach ($categories as $key=>$category){
            $subCategory = subCategory::where('category_id' , $category->id)->pluck('id')->toArray();
            $categories[$key]['products'] = product::whereIn('sub_category_id' ,  $subCategory)->get();
            $categories[$key]['name'] = $category->name;
        }
        return $categories;
    }
    public function getProductsByCategory($categoryId){

        $subCategory = subCategory::where('category_id' , $categoryId)->pluck('id')->toArray();
        $data['products'] = product::whereIn('sub_category_id' ,  $subCategory)->get();
        $data['category'] = $this->repository->find($categoryId);

        return $data;
    }
}
