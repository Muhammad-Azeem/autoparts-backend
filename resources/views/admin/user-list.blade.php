@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Users List</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <form method="get" action="{{ route('users-list') }}">
                                        <input class="form-control" type="search" name="search">
                                    </form>
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
                            <table class="table display table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Total Stories</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->dname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <input data-id="{{$user->id}}" data-role="{{ ($user->role === "1") ? 1 : 0 }}" class="toggle-class-user" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Blocked" {{ $user->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @if($user->role === "1")
                                                Admin
                                            @else
                                                Author
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $t = \App\Models\story::where("author","=",$user->id)->count();
                                                echo $t;
                                            @endphp
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('create-user', ['edit' => $user->id, 'user' => ($user->role === "1") ? "admin" : "author" ]) }}"><span class="typcn typcn-edit"></span></a>
                                            <a href="{{ route('users-list') }}?delete={{ $user->id }}"><span class="typcn typcn-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center py-4 d-flex justify-content-end">
                                {!! (!empty($users) && !empty($users->links())) ? $users->links() :  ""  !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
