@php
    if(!empty(old())){
        $name = old('name');
        $slug = old('slug');
        $metaTitle = old('metaTitle');
        $metaDesc = old('metaDesc');
        $metaTag = old('metaTag');
        $schema = old('schema');
        $status = old('status');
        $parent = old('parent');
    }
    elseif (!empty($cat)){
        $name = $cat->name;
        $slug = $cat->slug;
        $metaTitle = $cat->metaTitle;
        $metaDesc = $cat->metaDesc;
        $metaTag = $cat->metaTag;
        $schema = $cat->schema;
        $status = $cat->status;
        $parent = $cat->parent;
    }
    else{
        $name = '';
        $slug = '';
        $metaTitle = '';
        $metaDesc = '';
        $metaTag = '';
        $schema = '';
        $status = '';
        $parent = '';
       }
@endphp
@extends('admin.layouts.main')
@section('content')
        <div class="body-content">
            <div class="row">
                <div class="col-md-112 col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    @if(request()->has('edit'))
                                        <h6 class="fs-17 font-weight-600 mb-0">Edit Classification</h6>
                                    @else
                                        <h6 class="fs-17 font-weight-600 mb-0">Create Classification</h6>
                                    @endif

                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="{{ route('create-story') }}" class="btn btn-info pull-right">Create Story</a>
                                    </div>
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

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="container mt-2 mb-2">
                                    <div class="alert alert-danger alert-dismissible fade show" style="width: 60%;" role="alert">
                                        <strong>{{ $error }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="card-body">
                            <form method="POST" action="{{ route('classification') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="text" name="id" value="{{ (!empty($cat->id)) ? $cat->id : '' }}" hidden="">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-group">
                                            <label class="req">Name</label>
                                            <input type="text" name="name" class="form-control cslug" value="{{ $name }}" data-link="slug">
                                        </div>
                                        <div class="form-group">
                                            <label class="req">Slug</label>
                                            <input type="text" name="slug" value="{{ $slug }}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-12 p-0">
                                            <label class="font-weight-600">Meta Title</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control tcount" placeholder="meta title..." name="metaTitle" value="{{ $metaTitle }}" data-count="text">
                                                <div class="input-group-append">
                                                    <span class="input-group-text count countShow">0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 p-0">
                                            <label class="font-weight-600">Meta Description</label>
                                            <div class="input-group">
                                                <textarea class="form-control tcount" id="exampleFormControlTextarea1" rows="3" name="metaDesc" data-count="text">{{ $metaDesc }}</textarea>
                                                <div class="input-group-append">
                                                    <span class="input-group-text count countShow">0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 p-0">
                                            <label class="font-weight-600">Meta Keywords</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control tcount" placeholder="meta keywords..." name="metaTag" value="{{ $metaTag }}" data-count="text">
                                                <div class="input-group-append">
                                                    <span class="input-group-text count countShow">0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 p-0">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b> Schema </b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="schema">
                                                        <div class="schema-rows">
                                                            <div class="new-schema border row p-2">
                                                                <span class="clear-data2">x</span>
                                                                <div class="col-lg-12">
                                                                    <div class="flex-center"><b><span class="no">1 &nbsp; - &nbsp; </span></b> <span class="schma_type"> </span> <input type="text" name="type[]" placeholder="schema name here" value="">  </div> <br>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-lg-12">
                                                                            <textarea rows="6" name="schema" class="form-control" placeholder="Schema here...">{{ $schema }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group col-lg-12 col-md-12 ">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b class="req"> Status </b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="skin-line">
                                                        <select name="status" class="form-control">
                                                            <option value="">Please Select Status</option>
                                                            <option value="1" {{ ($status === 1) ? 'selected' : 'selected' }}>Active</option>
                                                            <option value="0" {{ ($status === 0) ? 'selected' : '' }}>Draft</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        <div class="form-group col-lg-12 col-md-12">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-header card bg-secondary text-white">--}}
{{--                                                    <b> Parent Classification </b>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="skin-line">--}}
{{--                                                        <select name="parent" class="form-control">--}}
{{--                                                            <option value="">Select Classification</option>--}}
{{--                                                            @foreach($catlist as $cats)--}}
{{--                                                            <option value="{{ $cats->id }}" {{ ($cats->id == $parent) ? 'selected' : '' }}>{{ $cats->name }}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="form-group col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header card bg-secondary text-white">
                                                    <b> Parent Classification </b>
                                                </div>
                                                <div class="card-body">
                                                    <div class="skin-line">
                                                        <select name="parent" class="form-control basic-single">
                                                            <option value="">Select Parent Classification</option>
                                                            @foreach($catlist as $cats)
                                                                <option value="{{ $cats->id }}" {{ ($cats->id == $parent) ? 'selected' : '' }}>{{ (!empty($cats->parent)) ? '━ ' : '' }}{{ $cats->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" value="publish" class="btn btn-info float-right">Publish </button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection
