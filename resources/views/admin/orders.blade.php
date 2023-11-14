@extends("admin.layouts.main")
@section("content")
    @php
        $orders = \App\Models\order::orderBy('id','desc')->get();
        if(request()->has('status')){
            $status = request()->status;
            $orders = \App\Models\order::where([['status','like',"%$status%"],['is_again','=',null]])->orderBy('id','desc')->get();
        }
    @endphp
    @if (Session::has('msg'))
        <div class="container mt-3 mb-3">
            <div class="alert alert-{{session("type")}} alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! Session('msg') !!}</strong>
            </div>
        </div>
    @endif
    <div id="msg">
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Orders List</h6>
                            </div>
                            <div class="text-right">
                                <div class="btn-group mb-2 mr-1">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Search by Status
                                    </button>
                                    <div class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('order') }}">All</a>
                                        </li>
{{--                                        @foreach($stats['label'] as $st)--}}
{{--                                            <li>--}}
{{--                                                <a class="dropdown-item" href="?status={{ strtolower(str_replace(' ','-',$st)) }}">{{ $st }}</a>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                                        <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            @php
                                                $invoice_id = sprintf("%06d", 100000 + $order->id);
//                                                $shp_adr = json_decode($order->shipping_address,true);
                                            @endphp
                                            <tr class="_tr33 -dpm33">
                                                <td><a title="View Detail" href="?detail={{ $order->id }}">INV-{{ $invoice_id }}</a></td>
{{--                                                <td>{{ $shp_adr['bill_name'] }}<br><small>{{ $shp_adr['email'] }}</small></td>--}}
{{--                                                <td>{{ $shp_adr['bill_addr'] }}</td>--}}
{{--                                                <td>{{ $order->total_price }}</td>--}}
{{--                                                <td>{{ date("d-F-y", strtotime($order->created_at)) }}</td>--}}
{{--                                                <td class="shtd33">--}}
{{--                                                    {{ $order->status }}--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <a href="#" data-id="{{ $order->id }}" class="-change-order-status fa fa-exchange-alt" data-label="{{ $order->status }}" title="Change Order Status"></a>--}}

{{--                                                    <a class="fa fa-print" href="{{ route('invoice_p',$order->id) }}" target="_blank" title="Print Order"></a>--}}

{{--                                                    <a href="?delete={{ $order->id }}" data-id="{{ $order->id }}" class="_delAdminOrder fa fa-trash sconfirm" title="Delete Order"></a>--}}
{{--                                                </td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="cstatus" role="dialog" aria-hidden="false" style="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-600 red" id="exampleModalLabel5">Select Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="msg" id="exampleModalLabel4">

                    </div>
                    <div class="modal-body-s">
                        <input type="hidden" class="hidID" value="">
{{--                        @foreach($stats['label'] as $stat)--}}
{{--                            <input type="radio" value="{{ str_replace(' ','-',$stat) }}" name="vostat" class="" id="{{ str_replace(' ','-',$stat) }}" data-label="{{ $stat }}" >--}}
{{--                            <label for="{{ str_replace(' ','-',$stat) }}">{{ $stat }}</label>--}}
{{--                            <br>--}}
{{--                        @endforeach--}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success -change-vostat mr-1 mb-2 btn-lg" type="button">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
