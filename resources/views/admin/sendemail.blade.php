@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Send Email</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <a href="{{ route('email_list') }}" class="btn btn-info pull-right">Email List</a>
                                    <a href="{{ route('email') }}" class="btn btn-inverse pull-right">Send Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-9">
                                        <div class="row">
                                            <br>
                                            @if(Request::has('mail_r'))
                                                @php
                                                    $user_m = DB::table("users")->where('id',request()->mail_r)->first();
                                                @endphp
                                                @if(!empty($user_m))
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="req">Email</label>
                                                            <input type="email" name="email" id="title" class="form-control" value="{{ $user_m->email }}" required="">
                                                        </div>
                                                    </div>
                                                @endif
                                            @elseif(Request::has('mail_c'))
                                                @php
                                                    $user_m = DB::table("contactus")->where('id',request()->mail_c)->first();
                                                @endphp
                                                @if(!empty($user_m))
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="req">Email</label>
                                                            <input type="email" name="email" id="title" class="form-control" value="{{ $user_m->email }}" required="">
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="req">Email</label>
                                                        <input type="email" name="email" id="title" class="form-control" value="" required="">
                                                    </div>
                                                </div>
                                            @endif
                                        <div class="form-group">
                                            <label class="req">Subject</label><br>
                                            <input type="text" name="subject" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="req">Detail</label><br>
                                            <div>
                                                <a class="insert-media btn btn-primary btn-sm" data-type="image" data-for="editor" data-return="#oneditor" data-link="image">Add Image</a>
                                                <textarea class="form-control oneditor" rows="15" name="email_msg" id="oneditor" aria-hidden="true"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group" style="padding:10px;">
                                            <button type="submit" name="submit" value="send" class="btn btn-success float-right">Send Email</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
