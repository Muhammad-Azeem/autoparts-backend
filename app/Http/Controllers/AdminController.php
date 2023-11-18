<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index(){
        $orders = order::count("id");
        $categorys = category::count("id");
        $products = product::count("id");
        $users = User::count("id");
        return view('admin.dashboard',compact(['orders','products','categorys','users']));
    }

    public function customers(Request $request){
        if($request->has("delete")){
            $id = $request->delete;
            User::where('id',$id)->delete();
            return back()->with(['type' => 'success','msg'=>'Successfully Deleted']);
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
            return view('admin.order-details',compact('details'));
        }
        $lists = User::where('type', 1)->get();
        return view('admin.orders', compact(['lists']));
    }

    public function invoice_p(Request $request){
        $id = $request->id;
        $details = order::where('id',$id)->first();
        return view('admin.invoice',compact('details'));
    }

    public function login_info(Request $request){
        if ($request->isMethod("GET")) {
            return view('admin.loginsetting');
        }
        if($request->isMethod("POST")) {
            $admin = DB::table("users")->where('type','=','1')->first();
                if (!empty(request('username')) && !empty(request('old_password')) && empty(request('password'))) {
                    request()->validate(['username' => 'required|email', 'password' => 'required|password']);
                    DB::table("users")->where("type",'=', '1')->update(['email' => request('username')]);
                    return redirect("admin/login-info")->with('msg', 'Your settings saved successfully');
                }
                elseif (!empty(request('username')) && !empty(request('password'))) {
                    request()->validate(['username' => 'required|email', 'password' => 'required']);
                    DB::table("users")->where("type",'=', '1')->update(['email' => request('username'), 'password' => Hash::make($request->password)]);
                    return redirect("admin/login-info")->with('msg', 'Your settings saved successfully');
                }
            return redirect("admin/login-info")->with('msg', 'Your settings saved successfully');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin');
    }

}
