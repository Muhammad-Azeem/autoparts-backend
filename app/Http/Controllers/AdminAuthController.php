<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function login_(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                "email" => "required|email",
                "password" => "required"
            ]);
            $username = $request->email;
            $password = request('password');
            $img_s = request('imageSecurity');

            $rslt = DB::table('users')->where('email',$username)->first();

            if(!empty($rslt)){
                if (Auth::guard('admin')->attempt(['email' => $username, 'password' => $password])) {
                    return redirect('/admin/dashboard');
                } else {
                    return back()->with(['error' => 'Invalid Credentials']);
                }
            }
            else{
                return back()->with(['error'=>'Invalid Credentials']);
            }
        }
        else{
            return view('login');
        }
    }
}
