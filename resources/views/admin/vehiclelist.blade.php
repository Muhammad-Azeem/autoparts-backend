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
                                    <h6 class="fs-17 font-weight-600 mb-0">Vehicle List</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="{{ route('addVehicle') }}" class="btn btn-success pull-right">Add Vehicle</a>
                                    </div>
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
                                        <th>Company</th>
                                        <th>Model</th>
                                        <th>Year</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $m = 1;
                                    @endphp
                                    @foreach($lists as $list)
                                        <tr>
                                            <th scope="row">{{ $m }}</th>
                                            <td><a href="" target="_blank"><strong>{{ $list->company }}</strong></a></td>
                                            <td>{{ $list->model }}</td>
                                            <td>{{ $list->year }}</td>
                                            <td>
                                                <a class="fa fa-edit" href="?edit={{ $list->id }}" title="edit"></a>
                                                <a class="fa fa-trash sconfirm" href="?delete={{ $list->id }}" title="delete"></a>
                                            </td>
                                            @php $m++; @endphp
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
