@php
    if(!empty(old())){
        $fname = old('fname');
        $lname = old('lname');
        $bio = old('bio');
        $email = old('email');
        $password = old('password');
        $dname = old('dname');
        $facebook = old('facebook');
        $instagram = old('instagram');
        $linkedin = old('linkedin');
        $image = old('image');
        $role = old('role');
        $status = old('status');
    }
    elseif (!empty($user)){
        $id = $user->id;
        $fname = $user->fname;
        $lname = $user->lname;
        $dname = $user->dname;
        $email = $user->email;
        $securityImage = $user->securityImage;
        $bio = $user->bio;
        $facebook = $user->facebook;
        $instagram = $user->instagram;
        $linkedin = $user->linkedin;
        $role = $user->role;
        $status = $user->status;
    }
    else{
        $id = "";
        $fname = '';
        $lname = '';
        $bio = '';
        $email = '';
        $password = '';
        $dname = '';
        $facebook = '';
        $instagram = '';
        $linkedin = '';
        $image = '';
        $role = '';
        $status = '';
       }
@endphp
@extends('admin.layouts.main')
@section("content")
    <div class="body-content">
        @php
            $shuffle_img = get_security_img();
          shuffle($shuffle_img);
          $i = 1;
        @endphp
        <div class="row">
            <div class="col-md-112 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                @if(request()->has('edit'))
                                    <h6 class="fs-17 font-weight-600 mb-0">Edit User</h6>
                                @else
                                    <h6 class="fs-17 font-weight-600 mb-0">Create User</h6>
                                @endif

                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <a href="{{ route('users-list') }}" class="btn btn-info pull-right">User List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('msg'))
                        <div class="container mt-2 mb-2">
                            <div class="alert alert-{{session("type")}} alert-dismissible fade show" style="width: 60%;" role="alert">
                                <strong>{!! Session('msg') !!}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="container mt-2 mb-2">
                                <div class="alert alert-danger alert-dismissible fade show" style="width: 60%;" role="alert">
                                    <strong>{{ $error }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('create-user') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="userId" value="{{ $id ?? "" }}" hidden="">
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="row justify-content-between">
                                        <div class="form-group col-md-6 p-0 mr-4">
                                            <label class="font-weight-600">First Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control tcount" placeholder="First Name" name="fname" value="{{ $fname }}" data-count="text">

                                            </div>
                                        </div>
                                        <div class="form-group col-md-5 p-0">
                                            <label class="font-weight-600">Last Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control tcount" placeholder="Last Name" name="lname" value="{{ $lname }}" data-count="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Bio:</label>
                                        <div class="input-group">
                                            <textarea class="form-control tcount" id="exampleFormControlTextarea1" rows="3" name="bio" data-count="text">{{ $bio }}</textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600 req">Display Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" placeholder="Display Name" name="dname" value="{{ $dname }}" data-count="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="req">Email</label>
                                        <input type="email" name="email" class="form-control cslug" value="{{ $email }}" data-link="slug">
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="req">Password</label>
                                        <input type="password" name="password" id="pass" value="" class="form-control">
                                        <span toggle="#password-field" class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="req">Security Image</label>
                                        <div class="security" style="box-sizing: border-box;">
                                            <div class="d-flex flex-row justify-content-center">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach($shuffle_img as $key => $t)
                                                    @php
                                                        if($i < 8){
                                                          $i++;
                                                    @endphp
                                                    <label title="{{ $t['title'] }}">
                                                        <input type="radio" name="imageSecurity" value="{{ $t['value'] }}" class="radio-input security_image">
                                                        <i class="fa {{ $t['i'] }}" aria-hidden="true"></i>
                                                    </label>
                                                    @php
                                                        }else{
                                                          $i = 1;
                                                    @endphp
                                                    <label title="{{ $t['title'] }}">
                                                        <input type="radio" name="imageSecurity" value="{{ $t['value'] }}" class="radio-input security_image">
                                                        <i class="fa {{ $t['i'] }}" aria-hidden="true"></i>
                                                    </label>
                                            </div>
                                            <div class="d-flex flex-row justify-content-center">
                                                @php
                                                    }
                                                @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Facebook</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" placeholder="Facebook Url" name="facebook" value="{{ $facebook }}" data-count="text">

                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Instagram</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" placeholder="Instagram Url" name="instagram" value="{{ $instagram }}" data-count="text">

                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Linkedin</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" placeholder="Linkedin Url" name="linkedin" value="{{ $linkedin }}" data-count="text">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-header card bg-secondary text-white">
                                                <span><b> Photo [ Exact Size <small> 600 x 300</small>  ] </b> <a class="text-white float-right" href=""></a></span>
                                            </div>
                                            <div class="card-body d-flex justify-content-center align-items-center">
                                                <input type='file' name="coverImage" id="imgInp" />
                                                <img id="blah" src="{{ asset('assets/dist/img/fff.webp') }}" alt="your image" width="200" height="150" />
                                                {{--                                                <div class="uc-image" style="width: 97%;">--}}
                                                {{--                                                    <span class="clear-image-x">x</span>--}}
                                                {{--                                                    <input type="hidden" name="cover-image" id="" value="">--}}
                                                {{--                                                    <div id="coover" class="image_display" style="display:block;">--}}

                                                {{--                                                    </div>--}}
                                                {{--                                                    <div style="margin-top:10px;">--}}
                                                {{--                                                        <input type="file" name="" id="">--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group col-lg-12 col-md-12 ">
                                        <div class="card">
                                            <div class="card-header card bg-secondary text-white">
                                                <b class="req"> Role </b>
                                            </div>
                                            <div class="card-body">
                                                <div class="skin-line">
                                                    <select name="role" class="form-control">
                                                        <option>Please Select Role</option>
                                                        <option value="1" {{ ($role === "1") ? "selected" : ""  }}>Admin</option>
                                                        <option value="2" {{ ($role === "2") ? "selected" : "selected"  }}>Author</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 ">
                                        <div class="card">
                                            <div class="card-header card bg-secondary text-white">
                                                <b class="req"> Status </b>
                                            </div>
                                            <div class="card-body">
                                                <div class="skin-line">
                                                    <select name="status" class="form-control">
                                                        <option>Please Select Status</option>
                                                        <option value="1" {{ ($status === "1") ? 'selected' : 'selected' }}>Active</option>
                                                        <option value="0" {{ ($status === "0") ? 'selected' : '' }}>Block</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" value="publish" class="btn btn-info float-right">Publish </button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
