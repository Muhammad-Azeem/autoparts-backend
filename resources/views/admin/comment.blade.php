@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Comments</h6>
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
                            <table class="table display table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Comment</th>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Spam</th>
                                    <th>Comment At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->comment }}</td>
                                        <td>@php
                                                $sdetail = \App\Models\story::where("id","=",$comment->postId)->first(["title","slug"]);
                                                if(!empty($sdetail)){
                                                 $title = $sdetail->title;
                                                 @endphp
                                            <a href="{{ route('home') }}/20873{{ $comment->postId }}-{{ $sdetail->slug ?? "" }}" target="_blank">{{ $title }}</a>
                                                @php
                                                }else{
                                                    $page_id = substr($comment->postId, 5, 1000000);
                                                    $sdetail = \App\Models\old_story::where("id","=",$page_id)->first(["title"]);
                                                    $title = $sdetail->title;
                                                @endphp
                                            <a href="{{ route('home') }}/{{ $comment->postId }}-{{ Str::slug("$sdetail->title", '-') }}" target="_blank">{{ $title }}</a>
                                            @php
                                                }
                                        @endphp
                                        </td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>
                                            <input data-id="{{$comment->id}}" class="toggle-class-comment" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Draft" {{ $comment->status == 1 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <a href="?spam={{ $comment->id }}" class="text-danger fa fa-times fa-lg change-status" data-id="" title="Add to Spam"></a>
                                        </td>
                                        <td>{{ $comment->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $comments->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
