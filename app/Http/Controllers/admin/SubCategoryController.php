<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subCategory;
use App\Services\AddProductService;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $AddSubCategoryService;

    public function __construct(SubCategoryService $AddSubCategoryService = null)
    {
        $this->AddSubCategoryService = $AddSubCategoryService;
    }

    public function AddSCategory(Request $request){
        if ($request->isMethod("POST")){
            if (!empty($request->parent)){

            }
            else{
                $cat = $this->AddSubCategoryService->create($request->all());
                if(!empty($cat->id)){
                    return back()->with(['type'=>'success','msg'=>'Successfully Added']);
                }
            }
        }
        else{
            $cat = category::orderByDesc("id")->get();
            return view('admin.addscategory', compact(['cat']));
        }
    }
    public function SCategoryList(Request $request){
        if($request->has("delete")){
            $id = $request->delete;
            subCategory::where('id',$id)->delete();
            return back()->with(['type' => 'success','msg'=>'Sub Category Deleted Successfully']);
        }
        else{
            $lists = subCategory::orderByDesc("id")->get();
            return view('admin.scategorylist',compact(['lists']));
        }
    }

}
