<?php

use App\Mail\SampleMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\userController;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::match(['get','post'],'/signup',[userController::class,'signup'])->name('signup');
Route::match(['get','post'],'/signup',function (Request $request){
    if($request->isMethod('POST')){
//        $request->validate([
//            'fname' => 'max:255',
//            'lname' => 'max:255',
//            'bio' => 'max:500',
//            'email' => 'unique:users,email|required|email|max:255',
//            'password' => 'max:255',
//            'imageSecurity' => 'max:255',
//            'dname' => 'max:255',
//            'facebook' => 'max:255',
//            'instagram' => 'max:255',
//            'linkedin' => 'max:255',
//            'role' => '',
//            'status' => ''
//        ]);
        $token = Str::random(30);
        User::updateOrCreate([
            "id" => $request->userId
        ],[
                'email' => $request->email,
                'password' => $request->password,
                'email_verified_at' => '0',
                'rememberToken' => $token
            ]);

        $content = [
            'subject' => 'Email Verification',
            'body' => "$token"
        ];

        Mail::to("$request->email")->send(new SampleMail($content));
        if(!empty($request->storyId)){
            return response()->json(['type' => 'success','msg'=>'User Successfully Updated']);
        }else{
            return response()->json(['type' => 'success','msg'=>'User Successfully Added']);
        }
    }
    else{
        return response()->json(['msg'=>'Not Authorized']);
    }
})->name('signup');
