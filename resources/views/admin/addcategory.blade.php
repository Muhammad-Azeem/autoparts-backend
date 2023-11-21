@extends('admin.layouts.main')
@section('content')
    @php
        if(!empty(old())){
            $name = old();
        }
        elseif(!empty($cat)){
            $name = $cat->name;
        }
        else{
            $name = '';
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
                                            <input type="" name="slug" value="{{ (!empty($cat->id))?\Illuminate\Support\Str::slug($cat->name):'' }}" readonly class="form-control tcount" data-count="text" placeholder="Enter Category Slug Here" id="slug">
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
