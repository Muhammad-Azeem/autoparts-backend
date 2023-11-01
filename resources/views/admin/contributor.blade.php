@php
    if(!empty(old())){
        $fname = old('fname');
        $lname = old('lname');
        $bio = old('bio');
        $email = old('email');
        $dname = old('dname');
        $status = old('status');
    }
    elseif (!empty($user)){
        $id = $user->id;
         $user = json_decode($user->contributor);
        $fname = $user->fname;
        $lname = $user->lname;
        $dname = $user->dname;
        $email = $user->email;
        $bio = $user->bio;
        $status = $user->status;
    }
    else{
        $id = "";
        $fname = '';
        $lname = '';
        $bio = '';
        $email = '';
        $dname = '';
        $status = '';
       }
@endphp
@extends('admin.layouts.main')
@section("content")
    <div class="body-content">
        <div class="row">
            <div class="col-md-112 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                @if(request()->has('edit'))
                                    <h6 class="fs-17 font-weight-600 mb-0">Edit </h6>
                                @else
                                    <h6 class="fs-17 font-weight-600 mb-0">Create Contributor</h6>
                                @endif

                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <a href="{{ route('contributorlist') }}" class="btn btn-info pull-right">Contributor List</a>
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
                        <form method="POST" action="{{ route('contributor') }}" enctype="multipart/form-data">
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
                                </div>
                                <div class="col-lg-4 col-md-12">
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
