@extends('admin.layouts.main')
@section('content')
    <div class="main-content">
        <div class="body-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-12">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">Customers List</h6>
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width:40%">Customer Name</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Zip Code</th>
                                        <th>Registeration date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lists as $list)
                                        <tr>
                                            <th scope="row">{{ $list->id }}</th>
                                            <td><a href="" target="_blank"><strong>{{ $list->first_name }} {{ $list->last_name }}</strong></a></td>
                                            <td>{{ $list->email }}</td>
                                            <td>{{ $list->city }}</td>
                                            <td>{{ $list->zip_code }}</td>
                                            <td>{{ date("d M y h:i",strtotime($list->created_at)) }}</td>
                                            <td>
                                                <a class="fa fa-edit" href="?edit={{ $list->id }}" title="edit"></a>
                                                <a class="fa fa-trash sconfirm" href="?delete={{ $list->id }}" title="delete"></a>
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="text-align: center;">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
