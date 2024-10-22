<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\OrdersService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $ProductService;

    public function __construct(ProductService $ProductService = null)
    {
        $this->ProductService = $ProductService ;
    }

    public function find($id){
        return $this->ProductService->find($id);
    }
    public function getAllProducts() {
        return $this->ProductService->getAllProducts();
    }
    // public function getProductsBySubCategory(Request $request, $subcategory) {
    //     $products = $this->productService->getProductsBySubCategory($subcategory);

    //     return response()->json(['products' => $products], 200);
    // }
    public function create(Request $request){
        return $this->ProductService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->ProductService->update($id, $request);
    }

    public function delete($id){
        return $this->ProductService->delete($id);
    }
    public function search($searchString){
        return $this->ProductService->search($searchString);
    }
}
