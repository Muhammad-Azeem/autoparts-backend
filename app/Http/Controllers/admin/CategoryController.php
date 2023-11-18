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
        if($request->isMethod('get') and $request->has('edit')){
            $id = $request->edit;
            $cat = category::findOrFail($id);
            return view('admin.addcategory',compact(['cat']));
        }
        if ($request->isMethod("POST")){
            if (!empty($request->id)){
                $cat = $this->AddCategoryService->update($request->id,$request);
                return back()->with(['type' => 'success', 'msg' => 'Successfully Updated']);
            }
            else{
                $cat = $this->AddCategoryService->create($request->all());
                return back()->with(['type' => 'success', 'msg' => 'Successfully Added']);
            }
        }
        else{
            return view('admin.addcategory');
        }
    }
    public function CategoryList(Request $request){
        if($request->has("delete")){
            $id = $request->delete;
            category::where('id',$id)->delete();
            return back()->with(['type' => 'success','msg'=>'Categories And Related Sub Categories Are All Deleted Successfully']);
        }
        else{
            $lists = category::orderByDesc("id")->get();
            return view('admin.categorylist',compact(['lists']));
        }
    }

}
