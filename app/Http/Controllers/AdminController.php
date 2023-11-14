<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        return view('admin.dashboard');
    }

    public function customers(Request $request){
        if($request->isMethod("post")){

        }
        else{
            $lists = User::where('type',1)->get();
            return view('admin.customers', compact(['lists']));
        }
    }

    public function orders(Request $request){
        if($request->has("delete")){
            $id = $request->delete;
            order::where('id',$id)->delete();
            return back()->with(['type' => 'success','msg'=>'Successfully Deleted']);
        }
        if($request->has("detail")){
            $id = $request->detail;
            $details = order::where('id',$id)->first();
            return view('admin.order-detail',compact('details'));
        }
        $lists = User::where('type', 1)->get();
        return view('admin.orders', compact(['lists']));

    }


}
