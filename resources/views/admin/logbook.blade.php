@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Author Logbook</h6>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display table-bordered table-striped table-hover basic">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>IP Address</th>
                                    <th>IP Location</th>
                                    <th>Browser</th>
                                    <th>Device</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $log)
                                    <tr>
                                        <td>{{ date("d M Y h:i A", strtotime($log->time)) }}</td>
                                        <td>{{ $log->ip }}</td>
                                        <td>{{ $log->city }}</td>
                                        <td>{{ $log->browser }}</td>
                                        <td>{{ $log->device }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
