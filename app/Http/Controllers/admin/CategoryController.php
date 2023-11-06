<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\AddProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $AddProductService;

    public function __construct(AddProductService $AddProductService = null)
    {
        $this->AddProductService = $AddProductService;
    }

    public function AddCategory(Request $request){
        if ($request->isMethod("POST")){
            return view('admin.addcategory');
        }
        else{
            return view('admin.addcategory');
        }
    }
    public function CategoryList(Request $request){
        if ($request->isMethod("POST")){

        }
        else{
            return view('admin.categorylist');
        }
    }

}
