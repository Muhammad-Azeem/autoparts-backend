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
       $categories = category::all();
       foreach ($categories as $key=>$category){
        $subCategory = subCategory::where('category_id' , $category->id)->pluck('id')->toArray();
        $categories[$key]['products'] = product::whereIn('sub_category_id' ,  $subCategory)->get();
        $categories[$key]['name'] = $category->name;
       }
       return $categories;
    }

    public function getAllCategories() {
        return $this->CategoryService->getAllCategories();
    }

    public function update(Request $request,$id){
        return $this->CategoryService->update($id, $request);
    }

    public function delete($id){
        return $this->CategoryService->delete($id);
    }
}
