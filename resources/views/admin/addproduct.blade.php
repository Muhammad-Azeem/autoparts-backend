@extends('admin.layouts.main')
@section('content')
    <div class="body-content">
        @php
            if(!empty(old())){
                $name = old('name');
                $price = old('price');
                $description = old('description');
                $sub_category_id = old('sub_category_id');
                $vehicle_id = old('vehicle_id');
                $discounted_price = old('discounted_price');
                $vehicle_fitment = old('vehicle_fitment');
                $check_fitment = old('check_fitment');
                $other_name = old('other_name');
                $part_number = old('part_number');
                $replaced_by = old('replaced_by');
                $status = old('status');
                $available_stock = old('available_stock');
                $wholesale_price = old('wholesale_price');
                $minimum_quantity = old('minimum_quantity');
                $part_name_code = old('part_name_code');
                $manufacturer = old('manufacturer');
                $brand = old('brand');
                $replaces = old('replaces');
                $manufacturer_part_number = old('manufacturer_part_number');
                $part_description = old('part_description');
                $manufacturer_note = old('manufacturer_note');
                $fitment_type = old('fitment_type');
                $warranty = old('warranty');
                $part_description_other_name = old('part_description_other_name');
                $item_dimension = old('item_dimension');
                $item_weight = old('item_weight');
                $position = old('position');
                $condition = old('condition');
                $images = (!empty(old('images')))?old('images'):array();
            }
            elseif(!empty($pro)){
                $name = (!empty($pro->name))?$pro->name:'';
                $price = $pro->price;
                $description = $pro->description;
                $sub_category_id = $pro->sub_category_id;
                $vehicle_id = $pro->vehicle_id;
                $discounted_price = $pro->discounted_price;
                $vehicle_fitment = $pro->vehicle_fitment;
                $check_fitment = $pro->check_fitment;
                $other_name = $pro->other_name;
                $part_number = $pro->part_number;
                $replaced_by = $pro->replaced_by;
                $status = $pro->status;
                $available_stock = $pro->available_stock;
                $wholesale_price = $pro->wholesale_price;
                $minimum_quantity = $pro->minimum_quantity;
                $part_name_code = $pro->part_name_code;
                $manufacturer = $pro->manufacturer;
                $brand = $pro->brand;
                $replaces = $pro->replaces;
                $manufacturer_part_number = $pro->manufacturer_part_number;
                $manufacturer_note = $pro->manufacturer_note;
                 $part_description = $pro->part_description;
                $manufacturer_note = $pro->manufacturer_note;
                $fitment_type = $pro->fitment_type;
                $warranty = $pro->warranty;
                $part_description_other_name = $pro->part_description_other_name;
                $item_dimension = $pro->item_dimension;
                $item_weight = $pro->item_weight;
                $position = $pro->position;
                $condition = $pro->condition;
                $images = (!empty($pro->images))?json_decode($pro->images,true):array();
            }
            else{
                $name = '';
                $price = '';
                $description = '';
                $sub_category_id = '';
                $vehicle_id = '';
                $discounted_price = '';
                $vehicle_fitment = '';
                $other_name = '';
                $check_fitment = '';
                $part_number = '';
                $replaced_by = '';
                $status = '';
                $available_stock = '';
                $part_name_code = '';
                $images = array();
                $wholesale_price = '';
                $minimum_quantity = '';
                $manufacturer = '';
                $brand = '';
                $replaces = '';
                $manufacturer_part_number = '';
                $part_description = '';
                $manufacturer_note = '';
                $fitment_type = '';
                $warranty = '';
                $part_description_other_name = '';
                $item_dimension = '';
                $item_weight = '';
                $position = '';
                $condition = '';
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
                                            <input required type="text" name="name" value="{{ $name }}" class="form-control cslug" placeholder="Enter Product Name" data-link="slug" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="req font-weight-600">Slug:</label>
                                        <div class="input-group">
                                            <input type="" name="slug" readonly value="" class="form-control tcount" data-count="text" placeholder="Product Slug Here" id="slug">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="total_images" value="">
                                        @forelse($images as $val)
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
                                    <div class="form-group">
                                        <label class="font-weight-600 req">Description</label>
                                        <div>
                                            <textarea class="form-control oneditor" rows="5" name="description" id="oneditor" aria-hidden="true">{{ $description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600 req">Vehicle Fitment</label>
                                        <div>
                                            <textarea class="form-control oneditor" rows="9" name="vehicle_fitment" id="oneditor" aria-hidden="true">{{ $vehicle_fitment }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Part Name Code</label>
                                        <div class="input-group">
                                            <input type="text" name="part_name_code" value="{{ $part_name_code }}" class="form-control" placeholder="Enter Part Name Code" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Manufacturer</label>
                                        <div class="input-group">
                                            <input type="text" name="manufacturer" value="{{ $manufacturer }}" class="form-control" placeholder="Enter manufacturer" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Brand</label>
                                        <div class="input-group">
                                            <input type="text" name="brand" value="{{ $brand }}" class="form-control" placeholder="Enter Brand Name" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Replaces</label>
                                        <div class="input-group">
                                            <input type="text" name="replaces" value="{{ $replaces }}" class="form-control" placeholder="Enter Replaces" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Manufacturer Part Number</label>
                                        <div class="input-group">
                                            <input type="text" name="manufacturer_part_number" value="{{ $manufacturer_part_number }}" class="form-control" placeholder="Enter Manufacturer Part Number" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Part Description</label>
                                        <div class="input-group">
                                            <input type="text" name="part_description" value="{{ $part_description }}" class="form-control" placeholder="Enter Part Description" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Fitment Type</label>
                                        <div class="input-group">
                                            <input type="text" name="fitment_type" value="{{ $fitment_type }}" class="form-control" placeholder="Enter Fitment Type" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Warranty</label>
                                        <div class="input-group">
                                            <input type="text" name="warranty" value="{{ $warranty }}" class="form-control" placeholder="Enter Warranty" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Part Description Other Name </label>
                                        <div class="input-group">
                                            <input type="text" name="part_description_other_name" value="{{ $part_description_other_name }}" class="form-control" placeholder="Enter Part Description Other Name" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Manufacturer Note</label>
                                        <div class="input-group">
                                            <input type="text" name="manufacturer_note" value="{{ $manufacturer_note }}" class="form-control" placeholder="Enter Manufacturer Note" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Item Dimension</label>
                                        <div class="input-group">
                                            <input type="text" name="item_dimension" value="{{ $item_dimension }}" class="form-control" placeholder="Enter Item Dimension" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Item Weight</label>
                                        <div class="input-group">
                                            <input type="text" name="item_weight" value="{{ $item_weight }}" class="form-control" placeholder="Enter Item Weight" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Position</label>
                                        <div class="input-group">
                                            <input type="text" name="position" value="{{ $position }}" class="form-control" placeholder="Enter Position" data-link="" data-count="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-600">Condition</label>
                                        <div class="input-group">
                                            <input type="text" name="condition" value="{{ $condition }}" class="form-control" placeholder="Enter Condition" data-link="" data-count="text">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header card bg-success text-white">
                                                <label class="font-weight-600 req">Select SubCategory </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="skin-line">
                                                    <select name="sub_category_id" class="form-control basic-single">
                                                        <option value="">Select SubCategory</option>
                                                        @foreach($sub as $cats)
                                                            <option value="{{ $cats->id }}" {{ ($cats->id == $sub_category_id) ? 'selected' : '' }}>{{--{{ (!empty($cats->parent)) ? '━ ' : '' }}--}}{{ $cats->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header card bg-success text-white">
                                                <label class="font-weight-600 req">Select Vehicle </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="skin-line">
                                                    <select name="vehicle_id" class="form-control basic-single">
                                                        <option value="">Select Vehicle</option>
                                                        @foreach($veh as $cats)
                                                            <option value="{{ $cats->id }}" {{ ($cats->id == $vehicle_id) ? 'selected' : '' }} >{{ $cats->company }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="req">SKU<span class="text-danger">  unique</span></label>
                                        <input type="text" name="sku" class="form-control" value="" placeholder="Enter Stock Keeping Unit Code">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="req">Part Number<span class="text-danger">  unique</span></label>
                                        <input type="text" name="part_number" class="form-control" value="{{ $part_number }}" placeholder="Enter Partnumber">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="req">Wholesale Price<span class="text-danger">  unique</span></label>
                                        <input type="text" name="wholesale_price" class="form-control" value="{{ $wholesale_price }}" placeholder="Enter Wholesale Price">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="req">Minimum Quantity</label>
                                        <input type="text" name="minimum_quantity" class="form-control" value="{{ $minimum_quantity }}" placeholder="Enter Minimum Quantity">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="font-weight-600 req">Price</label>
                                        <div class="input-group">
                                            <input type="text" name="price" value="{{ $price }}" placeholder="Enter Product Old Price" class="form-control" min="0" max="99999" onkeydown="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="font-weight-600">Discounted Price</label>
                                        <div class="input-group">
                                            <input type="text" name="discounted_price" value="{{ $discounted_price }}" placeholder="Enter Product Discounted Price" class="form-control" min="0" max="99999" onkeydown="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="font-weight-600 req">Available in Stock</label>
                                        <div class="input-group">
                                            <input type="text" name="available_stock" value="{{ $available_stock }}" placeholder="Enter Available Stock" class="form-control" min="0" max="99999" onkeydown="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label class="font-weight-600"> Status</label><br>
                                                <div class="switch_box box_4">
                                                    <div class="input_wrapper">
                                                        <input type="checkbox" name="status" class="switch_4" {{ ($status=="on")?'checked':'' }}>
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
                                    <button type="submit" class="btn btn-success right" name="submit">Submit <span class="fa fa-paper-plane"></span></button>

                                </div>
                            </div>
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
