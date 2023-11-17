<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subCategory;
use App\Models\product;
class CategoryController extends Controller
{
    protected $CategoryService;

    public function __construct(CategoryService $CategoryService = null)
    {
        $this->CategoryService = $CategoryService ;
    }

    public function find($id){
        return $this->CategoryService->find($id);
    }

    public function create(Request $request){
        return $this->CategoryService->create($request->all());
    }

    public function getAllProductsByCategory() {
       return $this->CategoryService->getAllProductsByCategory();
    }
    public function getProductsByCategory($categoryId){
        return $this->CategoryService->getProductsByCategory($categoryId);
    }
<<<<<<< HEAD
=======

    public function getAllCategories() {
        return $this->CategoryService->getAllCategories();
    }

>>>>>>> 9c2a2573f0108c5fdecd1e03d23006200170da86
    public function update(Request $request,$id){
        return $this->CategoryService->update($id, $request);
    }

    public function delete($id){
        return $this->CategoryService->delete($id);
    }
}
