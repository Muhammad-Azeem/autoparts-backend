@extends('admin.layouts.main')

@section('content')
    @php
    $i = 1;
        if(!empty(old())){
            $meta_title = old('meta_title');
            $meta_desc = old('meta_description');
            $meta_tags = old('meta_tags');
            $schemas = (!empty(old('schema')))?old('schema'):array();
            $we= sizeof($schemas);
            foreach ($schemas as $schema){
                $schemas = ['code' => $schema ];
            }
            $og = old('og_image');
        }
        elseif(!empty($home)){
            $meta_title = (!empty($home->meta_title))?$home->meta_title:'';
            $meta_desc = $home->meta_description;
            $meta_tags = $home->meta_tags;
            $schemas = (!empty($home->schema))?json_decode($home->schema,true):array();
            $og = $home->og_image;
        }
        else{
            $meta_title = '';
            $meta_desc = '';
            $meta_tags = '';
            $schemas = array();
            $og = '';
        }
    @endphp
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Home Page Meta Settings</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <div class="actions">
                                        <a href="{{ route('homepage') }}" class="btn btn-inverse pull-right">Meta Settings</a>
                                        <a href="{{ route('h_slider') }}" class="btn btn-info pull-right">Slider Content</a>
                                        <a href="{{ route('h_meta') }}" class="btn btn-info pull-right">Home Page Settings</a>
                                    </div>
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
                            <input type="hidden" name="id" value="1">
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
                                            <textarea name="meta_description" rows="5" class="form-control tcount" data-count="text" placeholder="Enter Meta Description">{{ $meta_desc }}</textarea>
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
                                            <b>Home Page Schema Text</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="schema">
                                                <div class="form-rows schema-rows">
                                                    @forelse($schemas as $schema)
                                                        <div class="new-schema border row">
                                                            <span class="clear-data2">x</span>
                                                            <p class="mx-auto text-center"><b style="font-size:15px;"> Schema <span class="no">{{$i}}</span> </b></p>
                                                            <div class="col-lg-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-lg-12">
                                                                        <textarea rows="6" name="schema[]" class="form-control" placeholder="Type Your Schema Quotes here...">{{ $schema['code']  }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php($i++)
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
                                                    <input type="hidden" name="og_image" value="{{ $og }}">
                                                    <div id="og_image" class="image_display">
                                                        <img src="{{ $og }}">
                                                    </div>
                                                    <div style="margin-top:10px;">
                                                        <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#og_image" data-link="og_image">Add Image</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success right" name="submit">Submit <span class="fa fa-paper-plane"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
