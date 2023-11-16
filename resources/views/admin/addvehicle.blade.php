@extends('admin.layouts.main')
@section('content')
    @php
        if(!empty(old())){
            $company = old('company');
            $model = old('model');
            $year = old('year');
        }
        elseif(!empty($catD)){
            $company = $cat->company;
            $model = $cat->model;
            $year = $cat->year;
        }
        else{
            $company = '';
            $model = '';
            $year = '';
        }
    @endphp
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">{{ (!empty($cat->name))? 'Edit '.$cat->name.' Category':'Add Vehicle' }}</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <div class="actions">
                                        <a href="{{ route('vehicleList') }}" class="btn btn-success pull-right">Vehicle List</a>
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
                        @if ($errors->any())
                            <div class="alert alert-danger alert-block">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
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
                                        <label class="req font-weight-600">Company</label>
                                        <div class="input-group">
                                            <input type="text" name="company" value="{{ $company }}" class="form-control cslug" placeholder="Enter Company Name" data-link="slug" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="req font-weight-600">Model</label>
                                        <div class="input-group">
                                            <input type="text" name="model" value="{{ $model }}" class="form-control cslug" placeholder="Enter Model" data-link="slug" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="req font-weight-600">Year</label>
                                        <div class="input-group">
                                            <input type="number" name="year" value="{{ $year }}" class="form-control cslug" placeholder="" data-link="slug" data-count="text">
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
