<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Request;

class userController extends Controller
{
    public function signup(Request $request){
        if($request->isMethod('post')){
                $request->validate([
                    'fname' => 'max:255',
                    'lname' => 'max:255',
                    'bio' => 'max:500',
                    'email' => 'unique:users,email|required|email|max:255',
                    'password' => 'required|max:255',
                    'imageSecurity' => 'required|max:255',
                    'dname' => 'required|max:255',
                    'facebook' => 'max:255',
                    'instagram' => 'max:255',
                    'linkedin' => 'max:255',
                    'role' => 'required',
                    'status' => 'required'
                ]);
                $x = User::updateOrCreate([
                    "id" => $request->userId
                ],
                    [
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'bio' => $request->bio,
                        'email' => $request->email,
                        'password' => $request->password,
                        'securityImage' => $request->imageSecurity,
                        'dname' => $request->dname,
                        'facebook' => $request->facebook,
                        'instagram' => $request->instagram,
                        'linkedin' => $request->linkedin,
                        'role' => $request->role,
                        'status' => $request->status
                    ]);
            if(!empty($request->storyId)){
                return response()->json(['type' => 'success','msg'=>'User Successfully Updated']);
            }else{
                return response()->json(['type' => 'success','msg'=>'User Successfully Added']);
            }
        }
        else{
            return response()->json(['type' => 'danger','msg'=>'Helo']);
        }
    }
}
