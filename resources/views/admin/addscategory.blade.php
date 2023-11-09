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
        elseif(!empty($catD)){
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
                                        <a href="{{ route('addCategory') }}" class="btn btn-inverse pull-right">Add Category</a>
                                        <a href="{{ route('categoryList') }}" class="btn btn-success pull-right">Category List</a>
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
                                            <input type="" name="slug" value="{{ $slug }}" readonly class="form-control tcount" data-count="text" placeholder="Enter Category Slug Here" id="slug">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-header card bg-success text-white">
                                                <b> Parent Category </b>
                                            </div>
                                            <div class="card-body">
                                                <div class="skin-line">
                                                    <select name="category_id" class="form-control basic-single">
                                                        <option value="">Select Parent Classification</option>
                                                        @foreach($cat as $cats)
                                                            <option value="{{ $cats->id }}" {{--{{ ($cats->id == $parent) ? 'selected' : '' }}--}}>{{--{{ (!empty($cats->parent)) ? '━ ' : '' }}--}}{{ $cats->name }}</option>
                                                        @endforeach
                                                    </select>
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
