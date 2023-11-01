@php
    if (!empty($query)){
        $query = $query;
    }
    elseif (!empty($idOrUrl)){
        $idOrUrl = $idOrUrl;
    }
    elseif (!empty($from)){
        $from = $from;
    }
    elseif (!empty($authorname)){
        $authorname = $authorname;
    }
    elseif (!empty($to)){
        $to = $to;
    }
    else{
        $query = "";
        $idOrUrl = "";
        $from = "";
        $authorname = "";
        $to = "";
    }
@endphp
@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <b>Search </b>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('story-list') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-between">
                                <div class="form-group col-md-3 p-0">
                                    <label class="font-weight-600">Query</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control tcount" placeholder="Search for..." name="query" value="" data-count="text">
                                    </div>
                                </div>
                                <div class="form-group col-md-3 p-0">
                                    <label class="font-weight-600">Related Story ID or URL</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control tcount" placeholder="Id or Url" name="idorurl" value="" data-count="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text count countShow">0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 p-0">
                                    <label class="font-weight-600">From</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="daterange" value="{{ date("m/d/Y") }} - {{ date("m/d/Y") }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="form-group col-md-3 p-0">
                                    <div class="row">
                                        <div class="col-lg-12 pl-5">
                                            <p class="fs-16 font-weight-600 m-0">Only search in</p>
                                            <input class="form-check-input" type="checkbox" name="insearch" value="1" id="title" >
                                            <label class="form-check-label" for="title" style="margin-right: 2em;">Title</label>
                                            <input class="form-check-input" type="checkbox" name="insearch" value="2" id="excerpt">
                                            <label class="form-check-label" for="excerpt" style="margin-right: 2em;">Excerpt</label>
                                            <input class="form-check-input" type="checkbox" name="insearch" value="3" id="content">
                                            <label class="form-check-label" for="content">Content</label>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-lg-12 pl-5">
                                            <p class="fs-16 font-weight-600 m-0">Only show these types</p>
                                            <input class="form-check-input" type="checkbox" name="intype" value="2" id="sche" >
                                            <label class="form-check-label" for="sche" style="margin-right: 2em;">Scheduled</label>
                                            <input class="form-check-input" type="checkbox" name="intype" value="0" id="draft">
                                            <label class="form-check-label" for="draft" style="margin-right: 2em;">Draft</label>
                                            <input class="form-check-input" type="checkbox" name="intype" value="1" id="publi">
                                            <label class="form-check-label" for="publi">Published</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 p-0">
                                    <label class="font-weight-600">Author Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control tcount" placeholder="Author name" name="author" value="{{ $authorname }}" data-count="text">
                                    </div>
                                </div>
                                <div class="form-group col-md-3 p-0">
                                    <label class="font-weight-600">To</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control tcount" placeholder="Jan 4 2017 or Today" name="to" value="" data-count="text">
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn" style="background-color: #152a70; color: white;" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                @if(request()->has("search"))
                                    <h6 class="fs-17 font-weight-600 mb-0">Search List</h6>
                                    <a href="{{ route('story-list') }}" class="btn btn-info pull-right mt-3">Back</a>
                                @else
                                    <h6 class="fs-17 font-weight-600 mb-0">Story List</h6>
                                @endif
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
                                    <th>Author</th>
                                    <th>Classification</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th>Created At</th>
                                    <th>Published At</th>
                                    <th>Edited By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($storys as $story)
                                    <tr>
                                        <td><a href="{{ route('home') }}/20873{{ $story->id }}-{{ $story->slug }}" target="_blank">{{ $story->title }}</a></td>
                                        <td>@php
                                                $author = \App\Models\User::where('id','=',$story->author)->get();
                                                echo $author[0]->dname;
                                        @endphp</td>
                                        <td>
                                            @php
                                                $class = \App\Models\category::where("id",$story->classification)->pluck("name");
                                                echo
                                                $class[0]
                                            @endphp
                                        </td>
                                        <td>
                                            <input data-id="{{$story->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Draft" {{ $story->status ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ $story->views }}</td>
                                        <td>{{ $story->created_at }}</td>
                                        <td>{{ $story->update_date }}</td>
                                        <td>
                                            @php
                                            if(!empty($story->edited_by)){
                                                $users = explode(",",$story->edited_by);
                                                foreach ($users as $user){
                                                    if(!empty($user)){
                                                        $u = \App\Models\User::where("id",$user)->pluck("dname");
                                                        echo $u[0]."/";
                                                    }
                                                }
                                            }
                                            @endphp
                                        </td>
                                        <td  style="{{ ($story->sdelete == 1) ? "background-color: crimson;color:white;" : "" }}"><a href="{{ route('create-story') }}?edit={{ $story->id }}"><span class="typcn typcn-edit"></span></a> <a href="{{ route('story-list') }}?delete={{ $story->id }}"><span class="typcn typcn-trash sconfirm"></span></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center py-4 d-flex justify-content-end">
                                {!! (!empty($storys) && !empty($storys->links())) ? $storys->links() :  ""  !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
