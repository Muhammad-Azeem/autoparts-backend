<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subCategory;
use App\Services\AddProductService;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $AddCategoryService;

    public function __construct(CategoryService $AddCategoryService = null)
    {
        $this->AddCategoryService = $AddCategoryService;
    }

    public function AddCategory(Request $request){
        if ($request->isMethod("POST")){
            if (!empty($request->parent)){

            }
            else{
                $cat = $this->AddCategoryService->create($request->all());
                if(!empty($cat->id)){
                    return back()->with(['type'=>'success','msg'=>'Successfully Added']);
                }
            }
        }
        else{
            $cat = category::orderByDesc("id")->get();
            return view('admin.addcategory', compact(['cat']));
        }
    }
    public function CategoryList(Request $request){
        if ($request->isMethod("POST")){

        }
        else{
            $lists = category::orderByDesc("id")->get();
            return view('admin.categorylist',compact(['lists']));
        }
    }

}
