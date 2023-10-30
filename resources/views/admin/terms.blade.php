@extends('admin.layouts.main')

@section('content')
    @php
        $meta_title = (!empty($terms->meta_title))?$terms->meta_title:'';
        $meta_desc = (!empty($terms->meta_desc))?$terms->meta_desc:'';
        $meta_tags = (!empty($terms->meta_tags))?$terms->meta_tags:'';
        $schemas = (!empty($terms->schema))?json_decode($terms->schema,true):array();
        $content = (!empty($terms->content))?$terms->content:'';
    @endphp
    <div class="main-content">
        <nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
            <div class="sidebar-toggle-icon" id="sidebarCollapse">
                sidebar toggle<span></span>
            </div>
            <div class="d-flex flex-grow-1">
                <ul class="navbar-nav flex-row align-items-center ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a class="nav-link " href="https://aaraishcollections.com/admin/logout" title="Log Out">
                            <span class="typcn typcn-export-outline"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav><div class="body-content">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">Terms &amp; Conditions</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
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
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ (!empty($terms->id))?$terms->id : '' }}">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="req font-weight-600">Meta Title</label>
                                            <div class="input-group">
                                                <input maxlength="100" type="text" name="meta_title" value="{{ $meta_title }}" id="meta_title" class="form-control tcount" data-count="text" placeholder="Enter Meta Title">
                                                <div class="input-group-append">
                                                    <span class="input-group-text countShow">{{ strlen($meta_title) }}</span>
                                                </div>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-600">Meta Description</label>
                                            <div class="input-group">
                                                <textarea name="meta_desc" rows="4" class="form-control tcount" data-count="text" placeholder="Enter Meta Description">{{ $meta_desc }}</textarea>
                                                <div class="input-group-append">
                                                    <span class="input-group-text countShow">{{ strlen($meta_desc) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-600">Meta Tags</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control tcount" data-count="tags" placeholder="TAG1 , TAG2 , TAG3" name="meta_tags" value="{{ $meta_tags }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text countShow">{{ strlen($meta_tags) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-default form-group">
                                            <div class="card-header card bg-secondary text-white">
                                                <b>Contact Us Schema Text</b>
                                            </div>
                                            <div class="card-body">
                                                <div class="schema">
                                                    <div class="form-rows schema-rows">
                                                        @forelse($schemas as $schema)
                                                        <div class="new-schema border row">
                                                            <span class="clear-data2">x</span>
                                                            <p class="mx-auto text-center"><b style="font-size:15px;"> Schema 1<span class="no"></span> </b></p>
                                                            <div class="col-lg-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-lg-12">
                                                                        <textarea rows="6" name="schema[]" class="form-control" placeholder="Type Your Schema Quotes here...">{{ $schema['code'] }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                            <div class="new-schema border row">
                                                                <span class="clear-data2">x</span>
                                                                <p class="mx-auto text-center"><b style="font-size:15px;"> Schema 1<span class="no"></span> </b></p>
                                                                <div class="col-lg-12">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-lg-12">
                                                                            <textarea rows="6" name="schema[]" class="form-control" placeholder="Type Your Schema Quotes here..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                    <div style="text-align:right;">
                                                        <a href="" class="btn btn-success add-more-schema text-white">Add More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-600 req">Description</label>
                                            <div class="input-group">
                                                <textarea name="description" rows="15" class="form-control oneditor">{{ $content }}</textarea>
                                            </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b> OG Image <small> 1200 x 630</small></b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="uc-image">
                                                        <span class="clear-image-x">x</span>
                                                        <input type="hidden" name="og_image" value="{{ (!empty($terms->og_image))?$terms->og_image : '' }}">
                                                        <div id="og_image" class="image_display">
                                                            <img src="{{ (!empty($terms->og_image))?$terms->og_image : '' }}">
                                                        </div>
                                                        <div style="margin-top:10px;">
                                                            <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#og_image" data-link="og_image">Add Image</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success right" name="submit">Submit <span class="fa fa-paper-plane"></span></button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


