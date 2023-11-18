<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subCategory;
use App\Models\vehicle;
use App\Services\AddProductService;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
use App\Services\VehicleService;
use Illuminate\Http\Request;

class AddVehicleController extends Controller
{
    protected $AddVehicleService;

    public function __construct(VehicleService $AddVehicleService = null)
    {
        $this->AddVehicleService = $AddVehicleService;
    }

    public function AddV(Request $request){
        if($request->isMethod('get') and $request->has('edit')){
            $id = $request->edit;
            $cat = vehicle::findOrFail($id);
            return view('admin.addvehicle',compact(['cat']));
        }
        if ($request->isMethod("POST")){
            $request->validate([
                'company' => 'required',
                'model' => 'required',
                'year' => 'required',
            ]);
            if (!empty($request->id)) {
                $cat = $this->AddVehicleService->update($request->id, $request);
                return back()->with(['type' => 'success', 'msg' => 'Successfully Updated']);
            } else {
                $cat = $this->AddVehicleService->create($request->all());
                return back()->with(['type' => 'success', 'msg' => 'Successfully Added']);
            }
        }
        else{
            return view('admin.addvehicle');
        }
    }
    public function ShowV(Request $request){
        if($request->has("delete")){
            $id = $request->delete;
            vehicle::where('id',$id)->delete();
            return back()->with(['type' => 'success','msg'=>'Successfully Deleted']);
        } else{
            $lists = vehicle::orderByDesc("id")->get();
            return view('admin.vehiclelist',compact(['lists']));
        }
    }

}
