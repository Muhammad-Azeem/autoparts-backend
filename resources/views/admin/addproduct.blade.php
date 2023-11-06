@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        @php
            if(!empty(old())){
                $product_name = old('product_name');
                $slug = old('slug');
                $meta_title = old('meta_title');
                $meta_desc = old('meta_desc');
                $meta_tags = old('meta_tags');
                $description = old('description');
                $more_info = old('more_info');
                $sku = old('sku');
                $schemas = (!empty(old('schema')))?old('schema'):array();
                $we= sizeof($schemas);
                foreach ($schemas as $schema){
                    $schemas = ['code' => $schema ];
                }
                $new_price = old('new_price');
                $old_price = old('old_price');
                $show_on_home = old('show_on_home');
                $avail_stock = old('avail_stock');
                $avail_opt = old('avail_opt');
                $size_ex = (!empty(old('sizes')))?old('sizes'):array();
                $c_check = (!empty(old('categories')))?old('categories'):array();
                $cover = (!empty(old('cover_image')))?old('cover_image'):'';
                $og_image = (!empty(old('og_image')))?old('og_image'):'';
            }
            elseif(!empty($pro)){
                $product_name = (!empty($pro->product_name))?$pro->product_name:'';
                $slug = (!empty($pro->slug))?$pro->slug:'';
                $meta_title = (!empty($pro->meta_title))?$pro->meta_title:'';
                $meta_desc = $pro->meta_desc;
                $meta_tags = $pro->meta_tags;
                $description = $pro->description;
                $more_info = $pro->more_info;
                $sku = (!empty($pro->sku))?$pro->sku:'';
                $new_price = $pro->new_price;
                $old_price = $pro->old_price;
                $show_on_home = $pro->show_on_home;
                $avail_stock = $pro->avail_stock;
                $avail_opt = $pro->avail_opt;
                $schemas = (!empty($pro->schema_code))?json_decode($pro->schema_code,true):array();
                $size_ex = (!empty($pro->available_size))?json_decode($pro->available_size,true):array();
                $c_check = (!empty($pro->category))?explode(",",$pro->category):array();
                $cover = (!empty($pro->coverImage))?$pro->coverImage:'';
                $og_image = (!empty($pro->ogImage))?$pro->ogImage:'';
            }
            else{
                $product_name = '';
                $slug = '';
                $meta_title = '';
                $meta_desc = '';
                $meta_tags = '';
                $description = '';
                $more_info = '';
                $sku = '';
                $new_price = '';
                $old_price = '';
                $show_on_home = '';
                $avail_stock = '';
                $avail_opt = '';
                $schemas = array();
                $size_ex = '';
                $c_check = '';
                $cover = '';
                $og_image = '';
            }
        @endphp
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">{{ (!empty($pro))? 'Edit Product '.$pro->product_name: 'Add new product' }}</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">
                                    <div class="actions">
                                        <a href="{{ route('product') }}" class="btn btn-inverse pull-right">Add Product</a>
                                        <a href="{{ route('productList') }}" class="btn btn-success pull-right">Product List</a>
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
                        <form method="post" action="{{ route('product') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ (!empty($pro->id))?$pro->id:'' }}">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="req font-weight-600">Product Name</label>
                                        <div class="input-group">
                                            <input type="text" name="product_name" value="{{ $product_name }}" class="form-control cslug" placeholder="Enter Product Name" data-link="slug" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="req font-weight-600">Slug:</label>
                                        <div class="input-group">
                                            <input type="" name="slug" value="{{ $slug }}" class="form-control tcount" data-count="text" placeholder="Enter Product Slug Here" id="slug">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-header card bg-success text-white">
                                                <b> Product Images <small>600 x 800</small></b>
                                            </div>
                                            <div class="card-body gallery">
                                                <div class="form-group">
                                                    <input type="hidden" name="total_images" value="">
                                                    <div class="ext-image"></div>
                                                    <div class="add-more-images2"><a href="#" class="btn btn-success float-right">Add More</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600 req">Description</label>
                                        <div>
                                            <textarea class="form-control oneditor" rows="15" name="description" id="oneditor" aria-hidden="true">{{ $description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">More Info</label>
                                        <div>
                                            <textarea class="form-control oneditor" rows="15" name="more_info" id="oneditor" aria-hidden="true">{{ $more_info }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="req">SKU<span class="text-danger">  unique</span></label>
                                        <input type="text" name="sku" class="form-control" value="{{ $sku }}" placeholder="Enter Stock Keeping Unit Code">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="font-weight-600">Old Price</label>
                                        <div class="input-group">
                                            <input type="number" name="old_price" value="{{ $old_price }}" placeholder="Enter Product Old Price" class="form-control" min="0" max="99999" onkeydown="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="font-weight-600 req">New Price</label>
                                        <div class="input-group">
                                            <input type="number" name="new_price" value="{{ $new_price }}" placeholder="Enter Product New Price" class="form-control" min="0" max="99999" onkeydown="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label class="font-weight-600"> Show on Homepage</label><br>
                                                <div class="switch_box box_4">
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
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label class="font-weight-600">Available in Stock</label><br>
                                                <div class="switch_box box_4">
                                                    <div class="input_wrapper">
                                                        <input type="checkbox" name="avail_stock" class="switch_4" {{ ($avail_stock =="on")?'checked':'' }}>
                                                        <svg class="is_checked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.67 426.67">
                                                            <path d="M153.504 366.84c-8.657 0-17.323-3.303-23.927-9.912L9.914 237.265c-13.218-13.218-13.218-34.645 0-47.863 13.218-13.218 34.645-13.218 47.863 0l95.727 95.727 215.39-215.387c13.218-13.214 34.65-13.218 47.86 0 13.22 13.218 13.22 34.65 0 47.863L177.435 356.928c-6.61 6.605-15.27 9.91-23.932 9.91z"/>
                                                        </svg>
                                                        <svg class="is_unchecked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.982 212.982">
                                                            <path d="M131.804 106.49l75.936-75.935c6.99-6.99 6.99-18.323 0-25.312-6.99-6.99-18.322-6.99-25.312 0L106.49 81.18 30.555 5.242c-6.99-6.99-18.322-6.99-25.312 0-6.99 6.99-6.99 18.323 0 25.312L81.18 106.49 5.24 182.427c-6.99 6.99-6.99 18.323 0 25.312 6.99 6.99 18.322 6.99 25.312 0L106.49 131.8l75.938 75.937c6.99 6.99 18.322 6.99 25.312 0 6.99-6.99 6.99-18.323 0-25.313l-75.936-75.936z" fill-rule="evenodd" clip-rule="evenodd"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="font-weight-600">Available Option </label>
                                        <div class="switch_box box_4">
                                            <div class="input_wrapper" >
                                                <input type="checkbox" name="avail_opt" class="switch_4 t_switch" {{ ($avail_opt =="on")?'checked':'' }}>
                                                <svg class="is_checked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.67 426.67">
                                                    <path d="M153.504 366.84c-8.657 0-17.323-3.303-23.927-9.912L9.914 237.265c-13.218-13.218-13.218-34.645 0-47.863 13.218-13.218 34.645-13.218 47.863 0l95.727 95.727 215.39-215.387c13.218-13.214 34.65-13.218 47.86 0 13.22 13.218 13.22 34.65 0 47.863L177.435 356.928c-6.61 6.605-15.27 9.91-23.932 9.91z"/>
                                                </svg>
                                                <svg class="is_unchecked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.982 212.982">
                                                    <path d="M131.804 106.49l75.936-75.935c6.99-6.99 6.99-18.323 0-25.312-6.99-6.99-18.322-6.99-25.312 0L106.49 81.18 30.555 5.242c-6.99-6.99-18.322-6.99-25.312 0-6.99 6.99-6.99 18.323 0 25.312L81.18 106.49 5.24 182.427c-6.99 6.99-6.99 18.323 0 25.312 6.99 6.99 18.322 6.99 25.312 0L106.49 131.8l75.938 75.937c6.99 6.99 18.322 6.99 25.312 0 6.99-6.99 6.99-18.323 0-25.313l-75.936-75.936z" fill-rule="evenodd" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12" id="content" style="{{ (!empty($sizes))? "display:block;" : "display:none;" }}">
                                        <div class="card">
                                            <div class="card-header card bg-success text-white">
                                                <b>Available Size <span class="text-danger"> if stiched</span></b>
                                            </div>
                                            <div class="card-body">
                                                <span class="text-danger"></span>
                                                <div>
                                                    {{--@foreach($sizes as $size)
                                                        <div class="chk">
                                                            <input class="checkbo" type="checkbox" id="controle_in1{{ $size->size }}" name="sizes[]" value="{{ $size->id }}" {{ (!empty($size_ex) and in_array($size->id,$size_ex))?'checked':'' }}>
                                                            <label class="checkbox-inline des" for="controle_in1{{ $size->size }}">
                                                                {{ $size->size }}
                                                            </label>
                                                        </div>
                                                    @endforeach--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header card bg-success text-white">
                                                <label class="font-weight-600 req">Select Category </label>
                                            </div>
                                            <div class="card-body">
                                                    <span class="text-danger"></span>
                                                    <div>
                                                        {{--@foreach($cats as $cat)
                                                        <div class="chk">
                                                            <input class="checkbo" type="checkbox" id="controle_in1{{ $cat->name }}" name="categories[]" value="{{ $cat->id }}" {{ (!empty($c_check) and in_array($cat->id,$c_check))?'checked':'' }}>
                                                            <label class="checkbox-inline des" for="controle_in1{{ $cat->name }}">
                                                                {{ $cat->name }}
                                                            </label>
                                                        </div>
                                                        @endforeach--}}
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header card bg-success text-white">
                                                <label class="font-weight-600 req"><span><b> Cover Image <small> 300 x 400</small> </b> <a style="padding:2% 3%;border: 1px solid white;border-radius: 50%;" class="text-white float-right" href="" title="Please use 'PNG' Or 'JPEG' format image for Cover Image."><i class="fa fa-info"></i></a></span> </label>

                                            </div>
                                            <div class="card-body">
                                                <div class="uc-image">
                                                    <span class="clear-image-x">x</span>
                                                    <input type="hidden" name="cover_image" value="{{ $cover }}">
                                                    <div id="cover" class="image_display">
                                                        <img src="{{ $cover }}">
                                                    </div>
                                                    <div style="margin-top:10px;">
                                                        <a class="insert-media btn btn-success btn-sm" data-type="image" data-for="display" data-return="#cover" data-link="cover_image">Add Image</a>
                                                    </div>
                                                </div>
                                            </div>
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
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success right" name="submit">Submit <span class="fa fa-paper-plane"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".t_switch").on("change", function(){
            $("#content").toggle();
        });
    </script>
@endsection
