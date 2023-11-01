@php
    if(!empty(old())){
        $fname = old('fname');
        $lname = old('lname');
        $bio = old('bio');
        $email = old('email');
        $password = old('password');
        $dname = old('dname');
        $facebook = old('facebook');
        $instagram = old('instagram');
        $linkedin = old('linkedin');
        $image = old('image');
        $role = old('role');
        $status = old('status');
    }
    elseif (!empty($user)){
        $id = $user->id;
        $fname = $user->fname;
        $lname = $user->lname;
        $dname = $user->dname;
        $email = $user->email;
        $securityImage = $user->securityImage;
        $bio = $user->bio;
        $facebook = $user->facebook;
        $instagram = $user->instagram;
        $linkedin = $user->linkedin;
        $role = $user->role;
        $status = $user->status;
    }
    else{
        $id = "";
        $fname = '';
        $lname = '';
        $bio = '';
        $email = '';
        $password = '';
        $dname = '';
        $facebook = '';
        $instagram = '';
        $linkedin = '';
        $image = '';
        $role = '';
        $status = '';
       }
@endphp
@extends('admin.layouts.main')
@section("content")
    <div class="body-content">
        <div class="row">
            <div class="col-md-112 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Home Page Settings</h6>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('msg'))
                        <div class="container mt-2 mb-2">
                            <div class="alert alert-{{session("type")}} alert-dismissible fade show" style="width: 60%;" role="alert">
                                <strong>{!! Session('msg') !!}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="container mt-2 mb-2">
                                <div class="alert alert-danger alert-dismissible fade show" style="width: 60%;" role="alert">
                                    <strong>{{ $error }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('homepage') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="userId" value="2" hidden="">
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="card col-md-12 mb-3">
                                        <div class="card-header card bg-secondary text-white">
                                            <b> Home Page Design</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="homeDesign">
                                                <div class="form-rows">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Row</th>
                                                            <th>Title</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="sortable" class="home-design m-tbc todo-list msortable ui-sortable">
                                                        @if(!empty($tt))
                                                        @foreach($tt as $t)
                                                        <tr class="tr-row ui-sortable-handle">
                                                            <td>1</td>
                                                            <td>
                                                                <div class="form-group m-0">
                                                                    <input type="text" name="title[]" placeholder="Title" class="form-control" value="{{ $t }}">
                                                                    <div class="text-danger"> </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center"> <i class="fa fa-trash text-danger clear-item mx-auto my-auto"></i>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr class="tr-row ui-sortable-handle">
                                                            <td>1</td>
                                                            <td>
                                                                <div class="form-group m-0">
                                                                    <input type="text" name="title[]" placeholder="Title" class="form-control" value="">
                                                                    <div class="text-danger"> </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center"> <i class="fa fa-trash text-danger clear-item mx-auto my-auto"></i>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                    <div style="text-align:right;">
                                                        <a href="" class="btn btn-success add-home-design text-white"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card col-md-12 mb-3">
                                        <div class="card-header card bg-secondary text-white">
                                            <b> Top Ad</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="schema">
                                                <div class="schema-rows">
                                                    <div class="new-schema border row p-2">
                                                        <span class="clear-data2">x</span>
                                                        <div class="col-lg-12">
                                                            <div class="flex-center"><span class="schma_type"> </span>  </div> <br>
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-12">
                                                                    <textarea rows="6" name="topad" class="form-control" placeholder="Top Ad here...">{{ $tval->topad }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card col-md-12 mb-3">
                                        <div class="card-header card bg-secondary text-white">
                                            <b> Top Featured Ad</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="schema">
                                                <div class="schema-rows">
                                                    <div class="new-schema border row p-2">
                                                        <span class="clear-data2">x</span>
                                                        <div class="col-lg-12">
                                                            <div class="flex-center"><span class="schma_type"> </span>  </div> <br>
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-12">
                                                                    <textarea rows="6" name="tfad" class="form-control" placeholder="Top Featured Ad here...">{{ $tval->tfad }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card col-md-12 mb-3">
                                        <div class="card-header card bg-secondary text-white">
                                            <b> Bottom Featured Ad</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="schema">
                                                <div class="schema-rows">
                                                    <div class="new-schema border row p-2">
                                                        <span class="clear-data2">x</span>
                                                        <div class="col-lg-12">
                                                            <div class="flex-center"><span class="schma_type"> </span>  </div> <br>
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-12">
                                                                    <textarea rows="6" name="bfad" class="form-control" placeholder="Bottom Ad here...">{{ $tval->bfad }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" value="publish" class="btn btn-info float-right">Update </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    $(".add-home-design").click(function() {
    var html_obj = $(".home-design tr").first().clone();
    var ln = $(".home-design tr").length;
    $(html_obj).find("input").each(function() {
    $(this).attr("value", "");
    });
    $(html_obj).find("option").each(function() {
    $(this).removeAttr('selected')        });
    $(html_obj).find("textarea").each(function() {
    $(this).text("");
    });
    ;
    html_obj.find("td:first-child").text(parseInt(ln) + 1);
    $(".homeDesign .home-design").append("<tr>" + html_obj.html() + "</tr>");
    return false;
    });
    $(document).on("click", ".clear-item", function() {
    var v = window.confirm("Do you want to delete data?");
    if (v) {
    $(this).closest("tr").remove();
    }
    });
    </script>
@endsection
