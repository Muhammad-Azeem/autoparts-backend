@extends("admin.layouts.main")
@section("content")
    @php
        $c_total = 0;
        $x = 0;
        $items = 0;
    @endphp
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Reports List</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="">
                                        @csrf
                                        <div class="form-row justify-content-around" style="padding-left:0px;">
                                            <div class="form-group mr-2">
                                                <div class="input-group date">
                                                    <span class="input-group-text" style="background-color: #f4f4f5 !important;" id="basic-addon1">From &nbsp;<i class="fa fa-calendar"></i></span>
                                                    <input id="date_added" type="text" class="form-control _datetimepicker" value="{{ date('m/d/Y') }}" name="from" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="form-group mr-2">
                                                <div class="input-group date">
                                                    <span class="input-group-text" style="background-color: #f4f4f5 !important;" id="basic-addon1">To &nbsp;<i class="fa fa-calendar"></i></span>
                                                    <input id="date_modified" type="text" class="form-control _datetimepicker" value="{{ date('m/d/Y') }}" name="to">
                                                </div>
                                            </div>
                                            <div class="form-group mr-2">
                                                <select name="city" class="form-control selectpicker">
                                                    <option value="">Select City</option>
                                                    @foreach(DB::table("location")->orderBy("city","asc")->get() as $k => $v)
                                                        <option value="{{ $v->city }}">{{ $v->city }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mr-2">
                                                <select name="status" class="form-control">
                                                    <option value="">Select Status</option>
                                                    <option value="-1">Pendings</option>
                                                    <option value="accepted-by-admin">Accepted By Admin</option>
                                                    <option value="rejected-by-admin">Rejected By Admin</option>
                                                    <option value="shipped-to-client">Shipped To Client</option>
                                                    <option value="received-by-client">Received By Client</option>
                                                    <option value="complete">Complete</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Submit" class="btn btn-success" style="font-size: 16px;">
                                            </div>
                                        </div>
                                    </form>

                                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>City</th>
                                            <th>Sold Items</th>
                                            <th class="d-none">Sales Shipping</th>
                                            <th class="text-right">Payable</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                            <td>{{ date("M d, Y", strtotime($order->created_at)) }}</td>
                                                @php
                                                    $ship = json_decode($order->shipping_address,true);
                                                    $pros = json_decode($order->products,true);
                                                    $c_total += $order->total_price;
                                                @endphp
                                            <td>{{ $ship['bill_addr'] }} <br><small>{{ $ship['email'] }}</small></td>
                                            <td>{{ $ship['bill_loc'] }}</td>
                                            <td>
                                                @foreach($pros as $k => $pro)
                                                    @php
                                                        $x += $pro['qty'];
                                                        $items += 1;
                                                    @endphp
                                                @endforeach
                                                    Items: {{ $items }}
                                                    <br>
                                                    Qty: {{ $x }}
                                                @php
                                                    $x = 0;
                                                    $items = 0;
                                                @endphp
                                            </td>
                                            <td class="text-right">{{ $order->total_price }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-right" style="font-size:18px;"><strong>Total</strong></td>
                                                <td style="font-size:18px;" class="text-right"><strong>{{ $c_total }}</strong></td>
                                            </tr>
                                        </tfoot>

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
@endsection
