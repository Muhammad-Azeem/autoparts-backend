<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\subCategory;
use App\Models\vehicle;
use App\Services\AddProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddProductController extends Controller
{
    protected $AddProductService;

    public function __construct(AddProductService $AddProductService = null)
    {
        $this->AddProductService = $AddProductService;
    }

    public function AddProduct(Request $request){
        $sub = subCategory::orderByDesc("id")->get();
        $veh = vehicle::orderByDesc("id")->get();
        if($request->isMethod('get') and $request->has('id')){
            $id = $request->id;
            $pro = product::findOrFail($id);
            return view('admin.addproduct',compact(['pro','sub','veh']));
        }
        if ($request->isMethod("POST")){
            $validator = Validator::make($request->all(),[
                'name' => 'required|string',
                'price' => 'required',
                'description' => 'required',
                'discounted_price' => '',
                'vehicle_fitment' => 'required',
                'part_number' => 'required',
                'status' => 'required',
                'available_stock' => 'required',
                'wholesale_price' => 'required',
                'minimum_quantity' => 'required',
            ]);
            if($validator->fails()){
                return back()->with(['type' => 'danger','msg'=>$validator->messages()->first()]);
            }
            if (!empty($request->id)){
                $z = $this->AddProductService->update($request->id,$request);
            }else{
                $z = $this->AddProductService->create($request->all());
            }
             if (!null == $z){
                 return back()->with(['type' => 'success','msg'=>'Successfully Added']);
             }
        }
        else{
            return view('admin.addproduct',compact(['sub','veh']));
        }
    }
    public function ProductList(Request $request){
        if ($request->isMethod("POST")){

        }
        else{
            $lists = product::orderByDesc("id")->get();
            return view('admin.productlist', compact(['lists']));
        }
    }
    public function find($id){
        return $this->AddProductService->find($id);
    }

    public function create(Request $request){
        return $this->AddProductService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->AddProductService->update($id, $request);
    }

    public function delete($id){
        return $this->AddProductService->delete($id);
    }

}
