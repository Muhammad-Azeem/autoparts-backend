@extends('admin.layouts.main')
@section("content")
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Contributor List</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <a href="{{ route('contributor') }}" class="btn btn-info pull-right">Create Contributor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                        <div class="table-responsive">
                            <table class="table display table-bordered table-striped table-hover basic">
                                <thead>
                                <tr>
                                    <th>Display Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\contributor::orderByDesc("id")->get(["contributor","id"]) as $c)
                                    @php
                                    $classification = json_decode($c->contributor);
                                    @endphp
                                    <tr>
                                        <td>{{ $classification->dname }}</td>
                                        <td>
                                            {{ $classification->email }}
                                        </td>
                                        <td>
                                            {{ $classification->status == 1 ? "Active" : "Blocked" }}
                                        </td>
                                        <td><a href="{{ route('contributor') }}?edit={{ $c->id }}"><span class="typcn typcn-edit"></span></a></td>
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
