@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Classification List</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <a href="{{ route('classification') }}" class="btn btn-info pull-right">Create Classification</a>
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
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Total Stories</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($classifications as $classification)
                                    <tr>
                                        <td>{{ $classification->name }}</td>
                                        <td>
                                            @php
                                                if($classification->status === 1){
                                                    @endphp
                                            <a href="{{ route('classification-list') }}?draft={{ $classification->id }}" class="text-success fa fa-check fa-lg change-status" data-id="{{ $classification->id }}" title="Publish"></a>
                                                    @php
                                                }
                                                else{
                                                    @endphp
                                            <a href="{{ route('classification-list') }}?active={{ $classification->id }}" class="text-danger fa fa-times fa-lg change-status" data-id="{{ $classification->id }}" title="Draft"></a>
                                                    @php
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                $s = \App\Models\story::where("classification","=",$classification->id)->count("id");
                                                echo $s;
                                            @endphp
                                        </td>
                                        <td>{{ $classification->created_at }}</td>
                                        <td><a href="{{ route('classification') }}?edit={{ $classification->id }}"><span class="typcn typcn-edit"></span></a></td>
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
