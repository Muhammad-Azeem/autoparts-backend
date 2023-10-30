@extends('admin.layouts.main')
@section("content")
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Admin Login Data</h6>
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
                                        <td><strong>IP Address</strong></td>
                                        <td><strong>IP Location</strong></td>
                                        <td><strong>Browser</strong></td>
                                        <td><strong>Device</strong></td>
                                        <td><strong>Platform</strong></td>
                                        <td><strong>Version</strong></td>
                                        <td><strong>Date</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($logs as $log)
                                            <tr>
                                                <td>{{ $log->id }}</td>
                                                <td>{{ $log->ip_ad }}</td>
                                                <td>{{ $log->ip_loc }}</td>
                                                <td>{{ $log->browser }}</td>
                                                <td>{{ $log->device }}</td>
                                                <td>{{ $log->platform }}</td>
                                                <td>{{ $log->version }}</td>
                                                <td>{{ date("d M y h:i",strtotime($log->created_at)) }}</td>
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
    </div>
@endsection
