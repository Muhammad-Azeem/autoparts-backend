@extends("admin.layouts.main")
@section("content")
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Email List</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <a href="{{ route('email_list') }}" class="btn btn-inverse pull-right">Email List</a>
                                    <a href="{{ route('email') }}" class="btn btn-info pull-right">Send Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Request::has('edit_c') || Request::has('edit_r'))
                                    @if(Request::has('edit_c'))
                                        @php
                                            $id = request()->edit_c;
                                            $us = DB::table("contactus")->where('id',$id)->first();
                                        @endphp
                                    @if(!empty($us))
                                            <form method="post" action="" style="text-align:center;">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <input type="hidden" name="id" value="{{ $us->id }}">
                                                <input type="text" placeholder="example@gmail.com" name="email" value="{{ $us->email }}" class="form-control" style="margin-bottom:10px;">
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <input type="text" placeholder="Name" name="name" value="{{ $us->name }}" class="form-control" style="margin-bottom:10px;">
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <input type="submit" name="submit" value="Save" class="btn btn-info pull-right">
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                @elseif(Request::has('edit_r'))
                                        @php
                                            $id = request()->edit_r;
                                            $us_r = DB::table("users")->where('id',$id)->first();
                                        @endphp
                                        @if(!empty($us_r))
                                        <form method="post" action="" style="text-align:center;">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <input type="hidden" name="id" value="{{ $us_r->id }}">
                                                    <input type="text" placeholder="example@gmail.com" name="email" value="{{ $us_r->email }}" class="form-control" style="margin-bottom:10px;">
                                                    @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <input type="text" placeholder="Name" name="name" value="{{ $us_r->name }}" class="form-control" style="margin-bottom:10px;">
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <input type="submit" name="submit" value="Save" class="btn btn-info pull-right">
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                @endif
                                @endif
                                <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                                    <thead>
                                    <tr>
                                        <td><strong>#</strong></td>
                                        <td><strong>Email</strong></td>
                                        <td class="text-center"><strong>Via</strong></td>
                                        <td><strong>Date</strong></td>
                                        <td><strong>Action</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($regs as $reg)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $reg->email }}</td>
                                            <td class="text-center">Register</td>
                                            <td>{{ date("d-F-Y, h:i:a", strtotime($reg->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('email_list',['edit_r' => $reg->id]) }}" class="fa fa-edit fa-lg mr-2" title="Edit"></a>
                                                <a href="?delete={{ $reg->id }}" class="fa fa-trash sconfirm mr-2 fa-lg" title="Delete"></a>
                                                <a href="{{ route('email',['mail_r'=>$reg->id]) }}" class="fa fa-envelope fa-lg mr-2" title="Send Email"></a>
                                            </td>
                                        </tr>
                                        @php($i++)
                                    @endforeach
                                    @foreach($reg_contacts as $cons)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $cons->email }}</td>
                                            <td class="text-center">Contact</td>
                                            <td>{{ date("d-F-Y, h:i:a", strtotime($cons->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('email_list',['edit_c' => $cons->id]) }}" class="fa fa-edit fa-lg mr-2" title="Edit"></a>
                                                <a href="?delete={{ $reg->id }}" class="fa fa-trash sconfirm mr-2 fa-lg" title="Delete"></a>
                                                <a href="{{ route('email',['mail_c'=>$cons->id]) }}" class="fa fa-envelope fa-lg mr-2" title="Send Email"></a>
                                            </td>
                                        </tr>
                                        @php($i++)
                                    @endforeach
                                    </tbody>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
