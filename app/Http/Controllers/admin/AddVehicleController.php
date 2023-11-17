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
        if ($request->isMethod("POST")){
            if (!empty($request->id)){

            }
            else{
                $request->validate([
                    'company' => 'required',
                    'model' => 'required',
                    'year' => 'required',
                ]);
                $cat = $this->AddVehicleService->create($request->all());
                if(!empty($cat->id)){
                    return back()->with(['type'=>'success','msg'=>'Successfully Added']);
                }
            }
        }
        else{
            return view('admin.addvehicle');
        }
    }
    public function ShowV(Request $request){
        if ($request->isMethod("POST")){

        }
        else{
            $lists = vehicle::orderByDesc("id")->get();
            return view('admin.vehiclelist',compact(['lists']));
        }
    }

}
