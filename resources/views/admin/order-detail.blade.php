@extends("admin.layouts.main")
@section("content")
    @php
        $invoice_id = sprintf("%06d", 100000 + $details->id);
        $ship_ad = json_decode($details->shipping_address,true);
        $products = json_decode($details->products,true);
    @endphp
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Orders Detail</h6>
                            </div>
                            <div class="text-right">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row _print_invoice">
                                <div class="col-sm-6">
                                    <h5>To:</h5>
                                    <address style="text-transform: capitalize;">
                                        <strong>{{ key_val('site_name') }}</strong><br>
                                        {{ key_val('company_address') }}<br>
                                        <strong>Phone:</strong>
                                        {{ key_val('company_phone') }} <br>
                                        <span style="display:inline-block;width:47px;"></span> <br>
                                        <span style="display:inline-block;width:47px;"></span>        </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No.</h4>
                                    <h4 class="text-navy">INV-{{ $invoice_id }}</h4>
                                    <span>From:</span>
                                    <div class="clearfix"></div>
                                    <table style="max-width:190px;display:block;float:right;">
                                        <tbody><tr>
                                            <td style="text-transform: capitalize;"><strong>{{ $ship_ad['bill_name'] }}</strong></td>
                                        </tr>
                                        <tr style="text-transform: capitalize;">
                                            <td> {{ $ship_ad['bill_addr'] }} <br>
                                                {{ $ship_ad['bill_loc'] }}, Pakistan
                                                {{ $ship_ad['zip'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone:</strong> {{ $ship_ad['phone_1'] }}</td>
                                        </tr>
                                        </tbody></table>
                                    <div class="clearfix"></div>
                                    <p>
                                        <span><strong>Invoice Date:</strong>  {{ date("M d, Y", strtotime($details->created_at)) }}</span><br>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="table-responsive m-t _print_invoice_p">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Item List</th>
                                        <th>Size</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>

                                        <th style="text-align:right;">Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $k => $val)
                                        <tr>
                                        <td>
                                            <div>
                                                {{ $val['id'] }}  -  <a href="{{ route('HomeUrl').'/-2'.$val['id'] }}" target="_blank">{{ $val['product'] }}</a>                                            </div>
                                        </td>
                                            @if($val['is_stitch'] == "on")
                                                <td style="">Stitch</td>
                                            @else
                                                <td style="">Unstitch</td>
                                            @endif

                                        <td style="">{{ $val['price'] }}</td>
                                        <td style="">{{ $val['qty'] }}</td>
                                        <td style="text-align:right;">{{ $val['price'] * $val['qty'] }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <table class="table invoice-total _print_invoice_b">
                                <tbody>
                                <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td style="text-align:right;">{{ $details->total_price }} Pkr</td>
                                </tr>

                                <tr>
                                    <td><strong>Shipping Charges :</strong></td>
                                    <td style="text-align:right;">{{ $details->shipping }}</td>
                                </tr>
                                <tr class="total">
                                    <td>TOTAL :</td>
                                    <td style="text-align:right;">
                                        {{ $details->total_price }} Pkr</td>
                                </tr>
                                <tr class="print_inv">
                                    <td colspan="2" style="padding:0px;padding-top:30px;padding-bottom:30px;">

                                        <a href="{{ route('invoice_p',$details->id) }}" class="btn btn-success right btn-lg" target="_blank"><i class="fa fa-print"></i>&nbsp; &nbsp; Print Invoice</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
