@extends('admin.layouts.main')
@section('content')
    <div class="main-content">
            <div class="body-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-12">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">Products List</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="{{ route('product') }}" class="btn btn-success pull-right">Add Product</a>
                                        <a href="{{ route('productList') }}" class="btn btn-inverse pull-right">Product List</a>
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width:40%">Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Views</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@foreach($lists as $list)
                                    <tr>
                                        <th scope="row">{{ $list->id }}</th>
                                        <td><a href="{{ route("HomeUrl").'/'.$list->slug.'-2'.$list->id }}" target="_blank"><strong>{{ $list->product_name }}</strong></a></td>
                                        <td>
                                            @php
                                                $cats = explode(',',$list->category);
                                                if(!empty($cats)){
                                                    foreach ($cats as $key => $cat){
                                                        if(!empty($cat)){
                                                           $cat_n = \App\Models\category::where('id',$cat)->first();
                                                           $cat_name = $cat_n->name;
                                                           @endphp
                                                                <a href="{{ route("HomeUrl").'/'.$cat_n->slug.'-1'.$cat_n->id }}" target="_blank">{{ $cat_name }}</a>
                                                            @php
                                                        }
                                                    }
                                                }
                                                else{
                                                    echo "<b style='color:  red'>No Category Exist</b>";
                                                }
                                            @endphp
                                        </td>
                                        <td>{{ $list->new_price }}</td>
                                        <td>{{ $list->views }}</td>

                                        <td>{{ date("d M y h:i",strtotime($list->created_at)) }}</td>
                                        <td>
                                            @if($list->status == '1')
                                                <a href="?inactive={{ $list->id }}" class="text-success fa fa-ban" data-id="{{ $list->id }}" title="Make Inactive"></a>
                                            @else
                                                <a href="?active={{ $list->id }}" class="text-success fa fa-check" data-id="{{ $list->id }}" title="Make active"></a>
                                            @endif
                                            <a class="fa fa-edit" href="{{ route('ad-product') }}?edit={{ $list->id }}" title="edit"></a>
                                            <a class="fa fa-trash sconfirm" href="?delete={{ $list->id }}" title="delete"></a>
                                        </td>
                                        @endforeach--}}
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="text-align: center;">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
