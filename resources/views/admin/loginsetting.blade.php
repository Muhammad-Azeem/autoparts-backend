@extends("admin.layouts.main")
@section("content")
    <div class="body-content">
        @php
            $shuffle_img = get_security_img();
          shuffle($shuffle_img);
          $i = 1;
        @endphp
        <div class="row">
            <div class="col-md-12 col-lg-10">
                <div class="card mb-4">
                    <div class="card-header bg-success text-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Login Settings</h6>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('msg'))
                        <span class="alert alert-success" style="display: block;"> {!! Session('msg') !!} </span>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-9">
                                <label class="req">Admin Slug</label>
                                <input type="text" name="admin_slug" value="" class="form-control">
                            </div>
                            <div class="form-group col-md-9">
                                <label class="req">Username</label>
                                <input type="text" name="username" value="" class="form-control">
                            </div>
                            <div class="form-group col-md-9">
                                <label class="req">Old Password</label>
                                <input type="password" name="old_password" value="" class="form-control">
                                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                            </div>
                            <div class="form-group col-md-9">
                                <label class="req">New Password</label>
                                <input type="password" name="password" value="" class="form-control">
                                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                            </div>
                            <div class="form-group col-md-9">
                                <label class="req">Confirm Password</label>
                                <input type="password" name="password_confirmation" value="" class="form-control">
                                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                            </div>
                            <div class="form-group col-md-9">
                                <label class="req">Old Security Image</label>
                                <div class="security" style="box-sizing: border-box;">
                                    <div class="d-flex flex-row justify-content-center">
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
                            <div class="form-group col-md-9">
                                <label class="req">New Security Image</label>
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
                                                <input type="radio" name="newimageSecurity" value="{{ $t['value'] }}" class="radio-input security_image">
                                                <i class="fa {{ $t['i'] }}" aria-hidden="true"></i>
                                            </label>
                                            @php
                                                }else{
                                                  $i = 1;
                                            @endphp
                                            <label title="{{ $t['title'] }}">
                                                <input type="radio" name="newimageSecurity" value="{{ $t['value'] }}" class="radio-input security_image">
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
                            <div class="form-group col-md-9">
                                <input type="submit" name="submit" value="Update" class="btn btn-success float-right">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
