@extends('admin.layouts.main')

@section('content')
    @php
        $sliders = (!empty($slider->slider_images))?json_decode($slider->slider_images,true):array();
    @endphp
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Home Page Slider Content</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <div class="actions">
                                        <a href="{{ route('homepage') }}" class="btn btn-info pull-right">Meta Settings</a>
                                        <a href="{{ route('h_slider') }}" class="btn btn-inverse pull-right">Slider Content</a>
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
                            <div class="form-group col-lg-10 col-md-10">
                                <div class="card">
                                    <div class="card-header card bg-secondary text-white">
                                        <b>Slider Images 1300 x 400 </b>
                                    </div>
                                    <div class="card-body gallery">
                                        <div class="form-group">
                                            <input type="hidden" name="total_images" value="">
                                        @forelse($sliders as $val)
                                            @php
                                                $s_img = str_split(key($val),5);
                                               $image = $val['image'.$s_img[1]];
                                            @endphp
                                            <div class="uc-image col-lg-3 col-md-4 col-sm-6">
                                                <span class="close-image-x">x</span>
                                                <input type="hidden" name="image{{ $s_img[1] }}" value="{{ $image }}">
                                                <div id="image{{ $s_img[1] }}" class="image_display">
                                                    <img src="{{ $image }}" alt="">
                                                </div>
                                                <div style="margin-top:10px;">
                                                    <a class="insert-media btn btn-danger btn-sm" data-type="image" data-for="display" data-return="#image{{ $s_img[1] }}" data-link="image{{ $s_img[1] }}">Add Image</a>
                                                </div>
                                            </div>
                                        @empty
                                                <input type="hidden" name="total_images" value="">
                                                <div class="uc-image col-lg-3 col-md-4 col-sm-6">
                                                    <span class="close-image-x">x</span>
                                                    <input type="hidden" name="image1" value="">
                                                    <div id="image1" class="image_display">
                                                        <img src="" alt="">
                                                    </div>
                                                    <div style="margin-top:10px;">
                                                        <a class="insert-media btn btn-danger btn-sm" data-type="image" data-for="display" data-return="#image1" data-link="image1">Add Image</a>
                                                    </div>
                                                </div>
                                        @endforelse
                                            <div class="ext-image"> </div>
                                            <div class="add-more-images2"><a href="#" class="btn btn-success float-right">Add More</a> </div>
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
