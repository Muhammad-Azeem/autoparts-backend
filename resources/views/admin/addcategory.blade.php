@extends('admin.layouts.main')
@section('content')
    @php
        if(!empty(old())){
            $name = old();
            $slug = old();
            $meta_title = old();
            $meta_desc = old();
            $meta_tags = old();
            $show_on_home = old();
            $og_image = old();
        }
        elseif(!empty($cat)){
            $name = $cat->name;
            $slug = $cat->slug;
            $meta_title = $cat->meta_title;
            $meta_desc = $cat->meta_desc;
            $meta_tags = $cat->meta_tags;
            $show_on_home = $cat->show_on_home;
            $schemas = (!empty($cat->schema_code))?json_decode($cat->schema_code,true):array();
            $og_image = $cat->og_image;
        }
        else{
            $name = '';
            $slug = '';
            $meta_title = '';
            $meta_desc = '';
            $meta_tags = '';
            $show_on_home = '';
            $schemas = array();
            $og_image = '' ;
        }
    @endphp
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">{{ (!empty($cat->name))? 'Edit '.$cat->name.' Category':'Create Category' }}</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <div class="actions">
                                        <a href="{{ route('ad_category') }}" class="btn btn-inverse pull-right">Add Category</a>
                                        <a href="{{ route('category_list') }}" class="btn btn-success pull-right">Category List</a>
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
                            <input type="hidden" name="id" value="{{ (!empty($cat->id))?$cat->id:'' }}">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="req font-weight-600">Name</label>
                                        <div class="input-group">
                                            <input type="text" name="name" value="{{ $name }}" class="form-control cslug" placeholder="Enter Category Name" data-link="slug" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="req font-weight-600">Slug:</label>
                                        <div class="input-group">
                                            <input type="" name="slug" value="{{ $slug }}" class="form-control tcount" data-count="text" placeholder="Enter Category Slug Here" id="slug">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="req font-weight-600">Meta Title</label>
                                        <div class="input-group">
                                            <input maxlength="100" type="text" name="meta_title" value="{{ $meta_title }}" id="meta_title" class="form-control tcount" data-count="text" placeholder="Enter Meta Title">
                                            <div class="input-group-append">
                                                <span class="input-group-text countShow">0</span>
                                            </div>
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Meta Description</label>
                                        <div class="input-group">
                                            <textarea name="meta_desc" rows="5" class="form-control tcount" data-count="text" placeholder="Enter Meta Description">{{ $meta_desc }}</textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Meta Tags</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" data-count="tags" placeholder="TAG1 , TAG2 , TAG3" name="meta_tags" value="{{ $meta_tags }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text countShow">1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-default form-group">
                                        <div class="card-header card bg-success text-white">
                                            <b>Category Schema Text</b>
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
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Show on Homepage</label><br>
                                        <div class="input_wrapper">
                                            <input type="checkbox" name="show_on_home" class="switch_4" {{ ($show_on_home=="on")?'checked':'' }}>
                                            <svg class="is_checked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.67 426.67">
                                                <path d="M153.504 366.84c-8.657 0-17.323-3.303-23.927-9.912L9.914 237.265c-13.218-13.218-13.218-34.645 0-47.863 13.218-13.218 34.645-13.218 47.863 0l95.727 95.727 215.39-215.387c13.218-13.214 34.65-13.218 47.86 0 13.22 13.218 13.22 34.65 0 47.863L177.435 356.928c-6.61 6.605-15.27 9.91-23.932 9.91z"/>
                                            </svg>
                                            <svg class="is_unchecked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.982 212.982">
                                                <path d="M131.804 106.49l75.936-75.935c6.99-6.99 6.99-18.323 0-25.312-6.99-6.99-18.322-6.99-25.312 0L106.49 81.18 30.555 5.242c-6.99-6.99-18.322-6.99-25.312 0-6.99 6.99-6.99 18.323 0 25.312L81.18 106.49 5.24 182.427c-6.99 6.99-6.99 18.323 0 25.312 6.99 6.99 18.322 6.99 25.312 0L106.49 131.8l75.938 75.937c6.99 6.99 18.322 6.99 25.312 0 6.99-6.99 6.99-18.323 0-25.313l-75.936-75.936z" fill-rule="evenodd" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header card bg-success text-white">
                                                <b> OG Image <small> 1200 x 630</small></b>
                                            </div>
                                            <div class="card-body">
                                                <div class="uc-image">
                                                    <span class="clear-image-x">x</span>
                                                    <input type="hidden" name="og_image" value="{{ $og_image }}">
                                                    <div id="og_image" class="image_display">
                                                        <img src="{{ $og_image }}">
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
@endsection
