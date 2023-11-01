@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        <div class="row">

            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <b>Web Push Notification </b>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="text" name="storyId" value="" hidden="">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="req">Story Id/Title</label>
                                        <input type="text" name="title" class="form-control cslug" value="" data-link="slug">
                                    </div>
                                    <h4>Optional Overrides:</h4>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Body</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" placeholder="title..." name="body" value="" data-count="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Excerpt:</label>
                                        <div class="input-group">
                                            <textarea class="form-control tcount" id="exampleFormControlTextarea1" rows="3" name="excerpt" data-count="text"></textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Icon</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" placeholder="Url" name="metaTitle" value="" data-count="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label class="font-weight-600">Image</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control tcount" placeholder="Url" name="metaTitle" value="" data-count="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text count countShow">0</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <input type="submit" class="btn" style="background-color: #152a70; color: white;" value="Notify Web Subscriber">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
