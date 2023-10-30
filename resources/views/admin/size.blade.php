@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        @php
            if(!empty($size)){
            $size = json_decode($size,true);
            }
        @endphp
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">Add New Sizes</h6>
                                    </div>
                                </div>
                                @if (Session::has('msg'))
                                    <div class="container mt-3 mb-3">
                                        <div class="alert alert-{{session("type")}} alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{!! Session('msg') !!}</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ (!empty($size[0]['id']))?$size[0]['id']:'' }}">
                                    <div class="form-group col-md-10">
                                        <label class="req">Add New Size</label>
                                        <input type="text" name="size" value="{{ (!empty($size[0]['size']))?$size[0]['size']:'' }}" placeholder="Enter New Size" class="form-control">
                                    </div>
                                    <div class="form-group col-md-10">
                                        @if(request()->has('edit'))
                                        <input type="submit" name="submit" value="Update" class="btn btn-success float-right">
                                        @else
                                            <input type="submit" name="submit" value="Add" class="btn btn-success float-right">
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">List Sizes</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                                            <thead>
                                            <tr>
                                                <td><strong>#</strong></td>
                                                <td><strong>Size</strong></td>
                                                <td><strong>Action</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sizes as $size)
                                            <tr>
                                                <td>{{ $size->id }}</td>
                                                <td>{{ $size->size }}</td>
                                                <td>
                                                    <a href="?edit={{ $size->id }}" class="mr-1 fa fa-edit fa-lg" title="Edit"></a>
                                                    <a href="?delete={{ $size->id }}" class="fa fa-trash sconfirm mr-1 fa-lg" title="Delete"></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">Arrange Sizes order</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="form-group">
                                                <ol id="sortable" class="m-tbc todo-list msortable ui-sortable">
                                                    @foreach($sizes->sortBy("order") as $size)
                                                        <li title="XS" class="r8 ui-sortable-handle"><input type="hidden" name="order[]" value="{{ (!empty($size->id))?$size->id:'' }}" class="form-control">{{ (!empty($size->size))?$size->size:'' }}</li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                            <button type="submit" class="btn btn-success right" name="submit">Submit <span class="fa fa-paper-plane"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
