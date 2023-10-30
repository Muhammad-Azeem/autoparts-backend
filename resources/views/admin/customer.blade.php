@extends("admin.layouts.main")
@section("content")
    @if (Session::has('msg'))
        <div class="container mt-3 mb-3">
            <div class="alert alert-{{session("type")}} alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! Session('msg') !!}</strong>
            </div>
        </div>
    @endif
    <div class="body-content">
        <div class="row">

            <div class="col-lg-12">
                <div class="card mb-12">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">List of Register Customers</h6>
                            </div>
                            <div class="text-right">
                                <div class="actions">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Number of Orders</th>
                                    <th>Total Cost</th>
                                    <th>Join Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($regs = \App\Models\User::get() as $reg)
                                    @php
                                        $order_Details = \App\Models\order::where('user_id',$reg->id)->get();
                                           $total_o_price = 0;
                                           $num_o_orders = 0;
                                           foreach ($order_Details as $detail){
                                                $total_o_price += $detail->total_price;
                                                $num_o_orders += 1;
                                           }
                                           $user_ad = \App\Models\user_detail::where('user_id',$reg->id)->first();
                                           $d = date("d M Y",strtotime($reg->created_at));
                                           $created_at = ['create_d' => "$d"];
                                           $for_j = [$reg,$user_ad,$created_at];
                                           $j_code = json_encode($for_j);

                                    @endphp
                                     <tr>
                                    <td scope="row">{{ $reg->id }}</td>
                                    <td><a href="#" title="User Detail" data-id="{{ $reg->id }}" class="_userDetail">{{ $reg->name }}</a></td>
                                    <td>{{ $num_o_orders }}</td>
                                    <td>{{ $total_o_price }}</td>
                                    <td>{{ date("d M y h:i",strtotime($reg->created_at)) }}</td>
                                    <td>
                                        <textarea class="userdata{{ $reg->id }}" style="display:none;">{{ $j_code }}</textarea>
                                        <a href="#" data-id="{{ $reg->id }}" class="fa fa-info _userDetail" title="User Detail"></a>
                                        @if($reg->status == 1)
                                            <a class="fa fa-undo" href="{{ route('customers',['unban'=>$reg->id]) }}" title="Unban User"></a>
                                        @else
                                        <a class="fa fa-ban" href="{{ route('customers',['ban'=>$reg->id]) }}" title="Ban User"></a>
                                        @endif
                                        <a class="fa fa-trash sconfirm" href="{{ route('customers') }}?delete={{ $reg->id }}" title="Delete User"></a>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-success fade" id="cstatus" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-600 cname" id="successModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="msg" style="font-size:16px;margin-bottom:10px;"></div>
                    <table class="table">
                        <tbody><tr>
                            <td>First Name</td>
                            <td class="name"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td class="email"></td>
                        </tr>
                        <tr>
                            <td>Join Date</td>
                            <td class="date"></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td class="country"></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td class="city"></td>
                        </tr>
                        <tr>
                            <td>Zip</td>
                            <td class="zip"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td class="phone"></td>
                        </tr><tr>
                            <td>Address</td>
                            <td class="address"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
