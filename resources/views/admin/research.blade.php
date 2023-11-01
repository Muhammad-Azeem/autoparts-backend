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
                        <form method="post" action="{{ route('research') }}" enctype="multipart/form-data">
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
                                           {{-- <input type="text" class="form-control tcount" placeholder="4 days ago" name="from" value="" data-count="text">--}}
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
                                        <input type="text" class="form-control tcount" placeholder="Author name" name="author" value="" data-count="text">
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
        @if(!empty($r))
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3 mb-4">
                    <div class="card-header">
                        <b>Results</b>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display table-bordered table-striped table-hover ordering">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Excerpt</th>
                                    <th>Author</th>
                                    <th>Views</th>
                                    <th>Created At</th>
                                    <th>Published At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($r as $z)

                                    <tr>
                                        <td><a href="{{ route('home') }}/20873{{ $z->id }}-{{ $z->slug }}" target="_blank">{{ $z->title }}</a></td>
                                        <td>{{ $z->excerpt }}</td>
                                        <td>@php
                                                $author = \App\Models\User::where('id','=',$z->author)->get(['dname']);
                                                echo $author[0]->dname;
                                            @endphp</td>
                                        <td>{{ $z->views }}</td>
                                        <td>{{ $z->created_at }}</td>
                                        <td>{{ $z->update_date }}</td>
                                        <td><a href="{{ route('create-story') }}?edit={{ $z->id }}"><span class="typcn typcn-edit"></span></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Excerpt</th>
                                    <th>Author</th>
                                    <th>Views</th>
                                    <th>Created At</th>
                                    <th>Published At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
