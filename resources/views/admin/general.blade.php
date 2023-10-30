@extends("admin.layouts.main")
@section("content")
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-10">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">General</h6>
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
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ (!empty($gen_edit->id))?$gen_edit->id:'' }}">
                            <div class="form-row">
                                <div class="form-group col-lg-3 col-md-3 logo-img">
                                    <label for="" class="req">Logo</label> <br>
                                    <div class="uc-image">
                                        <span class="clear-image-x">x</span>
                                        <input type="hidden" name="logo" value="{{ (!empty($gen_edit->logo))?$gen_edit->logo:'' }}">
                                        <div id="coover" class="image_display">
                                            <img src="{{ (!empty($gen_edit->logo))?$gen_edit->logo:'' }}">  </div>
                                        <div style="margin-top:10px;">
                                            <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#coover" data-link="logo">Add Image</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 logo-img">
                                    <label for="" class="req">Favicon</label>
                                    <div class="uc-image">
                                        <span class="clear-image-x">x</span>
                                        <input type="hidden" name="favicon" value="{{ (!empty($gen_edit->favicon))?$gen_edit->favicon:'' }}">
                                        <div id="favicon" class="image_display">
                                            <img src="{{ (!empty($gen_edit->favicon))?$gen_edit->favicon:'' }}">  </div>
                                        <div style="margin-top:10px;">
                                            <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#favicon" data-link="favicon">Add Image</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 logo-img">
                                    <label for="" class="req">OG image</label>
                                    <div class="uc-image">
                                        <span class="clear-image-x">x</span>
                                        <input type="hidden" name="og" value="{{ (!empty($gen_edit->og_image))?$gen_edit->og_image:'' }}">
                                        <div id="og" class="image_display">
                                            <img src="{{ (!empty($gen_edit->og_image))?$gen_edit->og_image:'' }}">
                                        </div>
                                        <div style="margin-top:10px;">
                                            <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#og" data-link="og">Add Image</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 logo-img">
                                    <label for="" class="req">Top Menu</label>
                                    <div class="uc-image">
                                        <span class="clear-image-x">x</span>
                                        <input type="hidden" name="top_menu" value="{{ (!empty($gen_edit->top_menu))?$gen_edit->top_menu:'' }}">
                                        <div id="top_menu" class="image_display">
                                            <img src="{{ (!empty($gen_edit->top_menu))?$gen_edit->top_menu:'' }}">
                                        </div>
                                        <div style="margin-top:10px;">
                                            <a class="insert-media btn btn-info btn-sm" data-type="image" data-for="display" data-return="#top_menu" data-link="top_menu">Add Image</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Facebook <small>For Display</small></label>
                                <input type="text" class="form-control" value="{{ (!empty($gen_edit->facebook))?$gen_edit->facebook:'' }}" name="facebook" placeholder="Facebbok">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label>Google <small>For Display</small></label>
                                <input type="text" class="form-control" value="#" name="google" placeholder="Google">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label>Instagram <small>For Display</small></label>
                                <input type="text" class="form-control" value="{{ (!empty($gen_edit->instgram))?$gen_edit->instagram:'' }}" name="instagram" placeholder="Instagram">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label>Twitter <small>For Display</small></label>
                                <input type="text" class="form-control" value="{{ (!empty($gen_edit->twitter))?$gen_edit->twitter:'' }}" name="twitter" placeholder="Twitter">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label>Pinterest <small>For Display</small></label>
                                <input type="text" class="form-control" value="{{ (!empty($gen_edit->pinterest))?$gen_edit->pinterest:'' }}" name="pinterest" placeholder="Pinterest">
                                <div class="text-danger"></div>
                            </div>

                            <div class="form-group ">
                                <label>Google Analytics:</label>
                                <textarea id="m" name="google_analytics" rows="3" class="form-control" placeholder="Google Analytics">{{ (!empty($gen_edit->google_analytics))?$gen_edit->google_analytics:'' }}</textarea>
                            </div>
                            <!-- webmaster tool-->
                            <div class="form-group">
                                <label>Web Master Tools Meta Tags:</label>
                                <textarea id="m" name="web_master" rows="3" class="form-control" placeholder="Web Master Tools Meta Tags">{{ (!empty($gen_edit->web_master))?$gen_edit->web_master:'' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Bing Master Tools Meta Tags:</label>
                                <textarea id="m" name="bing_master" rows="3" class="form-control" placeholder="Bing Master Tools Meta Tags">{{ (!empty($gen_edit->bing_master))?$gen_edit->bing_master:'' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Footer Text Copy Right:</label>
                                <textarea id="m" name="footer_txt" rows="3" class="form-control" placeholder="Footer Text">{{ (!empty($gen_edit->footer_txt))?$gen_edit->footer_txt:'' }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
