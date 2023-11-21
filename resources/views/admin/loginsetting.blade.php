@extends("admin.layouts.main")
@section("content")
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
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
                                <label class="req">Username</label>
                                <input type="text" name="username" value="" class="form-control">
                            </div>
                            <div class="form-group col-md-9">
                                <label class="req">New Password</label>
                                <input type="password" name="password" value="" class="form-control">
                                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
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
