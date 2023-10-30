@extends("admin.layouts.main")
@section("content")
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @if(Session::has('msg'))
                <div class="alert alert-{{ session('type') }}" role="alert">
                    <strong>{{ session('msg') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Orders List</h6>
                            </div>
                            <div class="text-right">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="border:none;width:75px;text-align:left;padding:0px;">
                                            Default
                                        </span>
                                        <span class="input-group-addon" style="border:none;width:50px;text-align:left;padding:0px;">
                                            Email
                                        </span>
                                        <span class="input-group-addon" style="border:none;width:100px;text-align:left;">
                                            Label
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    Description
                                </div>
                            </div>
                            <form method="post" action="">
                                @csrf
                                <div class="_sts">
                                    @php
                                        $orders_l = json_decode($orders->value,true);
                                        //dd(count($orders_l['label']));
                                        $i = 0;
                                    @endphp
                                    @forelse($orders_l as $k => $v)
                                        @if($i < count($orders_l['label']))
                                        <div class="_row" style="">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="width:70px;text-align:left;">
                                                                <input type="radio" name="def[]" value="{{ ($orders_l['default'][$i]!= null)?'1':'' }}" {{ ($orders_l['default'][$i]!= null)?'checked':'' }}>
                                                                <input type="hidden" name="default[]" value="{{ ($orders_l['default'][$i]!= null)?'1':'' }}">
                                                            </span>
                                                            <span class="input-group-addon" style="width:50px;text-align:left;">
                                                                <input type="checkbox" name="em[]" value="{{ ($orders_l['email'][$i]!= null)?'1':'' }}" {{ ($orders_l['email'][$i]!= null)?'checked':'' }}>
                                                                <input type="hidden" name="email[]" value="{{ ($orders_l['email'][$i]!= null)?'1':'' }}">
                                                            </span>
                                                            <input type="text" name="label[]" value="{{ ($orders_l['label'][$i]!=null)?$orders_l['label'][$i]:'' }}" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" name="desp[]" value="{{ ($orders_l['desp'][$i]!= null)?$orders_l['desp'][$i]:'' }}" class="form-control">
                                                            <span class="input-group-addon" style="padding:0px;">
                                                                <a href="#" class="btn btn-danger _delm" style="margin:0px;"><i class="fa fa-trash"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @php($i++)
                                    @empty
                                    @endforelse
                        </div>
                    </div>
                        <div style="margin-top:10px;">
                            <span class="btn btn-primary btn-sm btn-more" data-from="_row_n" data-to="_sts">Add More</span>
                        </div>
                    <button type="submit" class="btn btn-success right" name="submit">
                        Submit <span class="fa fa-paper-plane"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script>
        $(document).ready(function(){
            $(document).on("click","._delm",function(){
                var r = window.confirm("Do you want to delete status ?");
                if (r){
                    $(this).closest(".row").remove();
                }
            });
            $(document).on("click","input[name='def[]']",function(){
                $("input[name='def[]']").val("");
                $("input[name='default[]']").val("");
                $(this).parent().find("input[name='def[]']").val("1");
                $(this).parent().find("input[name='default[]']").val("1");
            });

            $(document).on("click","input[name='em[]']",function(){
                var c= $(this).is(":checked");
                if (c){
                    $(this).parent().find("input[name='em[]']").val("1");
                    $(this).parent().find("input[name='email[]']").val("1");
                }else{
                    $(this).parent().find("input[name='em[]']").val("");
                    $(this).parent().find("input[name='email[]']").val("");
                }
            });
        });
    </script>
    <div class="_row_n" style="display:none;">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" style="width:70px;text-align:left;">
                            <input type="radio" name="def[]" value="">
                            <input type="hidden" name="default[]" value="">
                        </span>
                        <span class="input-group-addon" style="width:50px;text-align:left;">
                            <input type="checkbox" name="em[]" value="">
                            <input type="hidden" name="email[]" value="">
                        </span>
                        <input type="text" name="label[]" value="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="desp[]" value="" class="form-control">
                        <span class="input-group-addon" style="padding:0px;">
                            <a href="#" class="btn btn-danger _delm" style="margin:0px;"><i class="fa fa-trash"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        ._delm{font-size: 17px;}
    </style>
@endsection
