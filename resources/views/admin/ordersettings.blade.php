@extends("admin.layouts.main")
@section("content")
    <div class="body-content">
        <div class="row">
            <div class="col-md-12 col-lg-10">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Order Settings</h6>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="container">
                        <div class="alert alert-danger alert-block">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="1">
                            <div class="form-group">
                                <label class="req">Business Name <small> for invoice</small></label>
                                <input type="text" class="form-control" value="{{ key_val('site_name') }}" name="site_name" placeholder="" required="">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label class="req">Business Address <small> for invoice</small></label>
                                <input type="text" class="form-control" value="{{ key_val('company_address') }}" name="company_address" placeholder="" required="">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label class="req">Business Phone <small> for invoice</small></label>
                                <input type="text" class="form-control" value="{{ key_val('company_phone') }}" name="company_phone" placeholder="" required="">
                                <div class="text-danger"></div>
                            </div>

                            <div class="form-group">
                                <label class="req">Order Recieving Emails <small> Seprated by comma</small></label>
                                <input type="text" class="form-control" value="{{ key_val('reciever_email') }}" name="reciever_email" placeholder="" required="">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label class="req">Shipping Free Upto</label>
                                <input type="number" class="form-control" value="{{ key_val('shipping_free_upto') }}" name="shipping_free_upto" placeholder="Shipping Cost" required="">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <label class="req">Shipping Cost</label>
                                <input type="number" class="form-control" value="{{ key_val('shipping_cost') }}" name="shipping_cost" placeholder="Shipping Cost" required="">
                                <div class="text-danger"></div>
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
