<style>
    .page-loader-wrapper {
        display: none;
    }

    ._print_invoice,
    ._print_invoice_p,
    ._print_invoice_b {
        width: 800px;
        margin: auto;
        font-family: Arial, Helvetica, sans-serif;
    }

    ._print_invoice .col-sm-6 {
        width: 50%;
        float: left;
    }

    .text-right,
    .text-right table td {
        text-align: right;
    }

    .clearfix {
        clear: both;
    }

    ._print_invoice {
        border-bottom: 1px solid #666;
        margin-bottom: 10px;
    }

    ._print_invoice,
    ._print_invoice table td {
        font-size: 14px;
    }

    ._print_invoice_p table {
        width: 100%;
        border-spacing: 0px;
        border-collapse: collapse;
        border-bottom: 1px solid #666;
    }

    ._print_invoice_p table th {
        text-align: left;
        border-bottom: 1px solid #666;
        padding-bottom: 10px;
    }

    ._print_invoice_p table td {
        font-size: 13px;
        padding: 8px 0px;
    }

    ._print_invoice_b {
        margin-top: 12px;
    }

    ._print_invoice_b td {
        font-size: 15px;
        padding-bottom: 8px;
    }

    ._print_invoice_b td strong {
        font-weight: 300;
    }

    ._print_invoice_b tr td:last-child {
        width: 25%;
    }

    ._print_invoice_b tr td:first-child {
        text-align: right;
        padding-right: 20px;
        width: 75%;
    }

    ._print_invoice_b .total {
        font-size: 18px;
        font-weight: bold;
    }

    ._print_invoice_b .print_inv {
        display: none;
    }
</style>
<script>
    window.print();
</script>
@php
    $invoice_id = sprintf("%06d", 100000 + $details->id);
    $ship_ad = json_decode($details->shipping_address,true);
    $products = json_decode($details->products,true);
@endphp
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
            <tr>
                <td style="text-transform: capitalize;">
                    <strong>{{ $ship_ad['bill_name'] }}</strong>
                </td>
            </tr>
            <tr style="text-transform: capitalize;">
                <td> {{ $ship_ad['bill_addr'] }} <br>
                    {{ $ship_ad['bill_loc'] }}, Pakistan
                    {{ $ship_ad['zip'] }}</td>
            </tr>
            <tr>
                <td><strong>Phone:</strong>  {{ $ship_ad['phone_1'] }}</td>
            </tr>
        </table>
        <div class="clearfix"></div>
        <p>
            <span><strong>Invoice Date:</strong> {{ date("M d, Y", strtotime($details->created_at)) }}</span><br>
        </p>
    </div>
    <div class="clearfix"></div>
</div>
<div class="table-responsive m-t _print_invoice_p">
    <table class="table invoice-table">
        <thead>
        <tr>
            <th>Item List</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th style="text-align:right;">Total Price</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $k => $val)
                <tr>
                    <td>
                        <div>
                            {{ $val['id'] }}  - &nbsp; <b>{{ $val['product'] }}</b>
                        </div>
                        @if($val['is_stitch'] == "on")
                        <small>Stitch</small>
                            @else
                        <small>Unstitch</small>
                        @endif
                    </td>
                    <td style="">{{ $val['qty'] }}</td>
                    <td style="">{{ $val['price'] }}</td>
                    <td style="text-align:right;">{{ $val['price'] * $val['qty'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<table class="table invoice-total _print_invoice_b">
    <tbody>
    <tr>
        <td><strong>Sub Total :</strong>
        </td>
        <td style="text-align:right;">{{ $val['price'] * $val['qty'] }} Pkr</td>
    </tr>
    <tr>
        <td><strong>Shipping Charges :</strong>
        </td>
        <td style="text-align:right;">{{ $details->shipping }}</td>
    </tr>
    <tr class="total">
        <td>TOTAL :</td>
        <td style="text-align:right;">{{ $details->total_price }} Pkr</td>
    </tr>
    <tr class="print_inv">
        <td colspan="2" style="padding:0px;padding-top:30px;padding-bottom:30px;">
        </td>
    </tr>
    </tbody>
</table>
