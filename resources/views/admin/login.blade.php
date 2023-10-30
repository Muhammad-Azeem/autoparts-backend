<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Admin Panel Login">
        <meta name="author" content="Bdtask">
        <title>Web Portal</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
        <!--Global Styles(used by all pages)-->
        <link rel="stylesheet" href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/metisMenu/metisMenu.min.css') }}">
        <link href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/typicons/src/typicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/themify-icons/themify-icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/glyphicons/glyphicons.css') }}" rel="stylesheet">
        <!--Third party Styles(used by this page)-->
        <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet">
        <!--Third party Styles(used by this page)-->
        <link href="{{ asset('assets/plugins/icheck/skins/all.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css') }}" rel="stylesheet">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-ui/js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/Sortable/js/Sortable.js') }}"></script>

        <!--Start Your Custom Style Now-->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    </head>
    <body class="bg-white">
        <div class="d-flex align-items-center justify-content-center text-center h-100vh">
            <div class="form-wrapper m-auto">
                <div class="form-container my-4">
                    <div class="register-logo text-center mb-4">
                        @if(Session::has('error'))
                            <div class="container mt-3 mb-3">
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{!! Session('error') !!}</strong>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="panel">
                        <div class="panel-header text-center mb-3">
                            <h3 class="fs-24">Sign into your account!</h3>
                            <p class="text-muted text-center mb-0">Nice to see you! Please log in with your account.</p>
                        </div>
                        <form class="register-form" method="post" action="">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" id="emial" placeholder="Enter email">
                                <div class="invalid-feedback text-left">Enter your valid email</div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="pass" placeholder="Password">
                            </div>
                            @php
                                $shuffle_img = get_security_img();
                              shuffle($shuffle_img);
                              $i = 1;
                            @endphp
                            <p class="loginsuccess">Select Your Security Image &nbsp;
                            </p>
                            <div class="security" style="box-sizing: border-box;">
                                <div class="d-flex flex-row justify-content-center">
                                    @foreach($shuffle_img as $key => $t)
                                        @php
                                            if($i < 5){
                                              $i++;
                                        @endphp
                                        <label title="{{ $t['title'] }}">
                                            <input type="radio" name="imageSecurity" value="{{ $t['value'] }}" class="radio-input security_image">
                                            <i class="fa {{ $t['i'] }}" aria-hidden="true"></i>
                                        </label>
                                        @php
                                            }else{
                                              $i = 1;
                                        @endphp
                                        <label title="{{ $t['title'] }}">
                                            <input type="radio" name="imageSecurity" value="{{ $t['value'] }}" class="radio-input security_image">
                                            <i class="fa {{ $t['i'] }}" aria-hidden="true"></i>
                                        </label>
                                </div>
                                <div class="d-flex flex-row justify-content-center">
                                    @php
                                        }
                                    @endphp
                                    @endforeach
                                </div>
                            </div>
                            @if(session()->has("d"))
                                <div class="row tryies" style="justify-content: space-evenly; margin-bottom: 10px; ">
                                    @php
                                        $d = session("d");
                                        $u = 5 - $d;
                                    @endphp
                                    @for($i = 0; $i < $d; $i++)
                                        <i class="fa fa-times" style="color: red;font-size: 20px"></i>
                                    @endfor
                                    @for($j = $u; $j > 0; $j--)
                                        <i class="fa fa-circle" style="color: gray;font-size: 15px"></i>
                                    @endfor
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success btn-block">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.End of form wrapper -->
        <!--Global script(used by all pages)-->
        <script src="{{ asset('assets/plugins/jQuery/jquery-3.6.0.min.js') }}"></script>
        <script src="assets/dist/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <!-- Third Party Scripts(used by this page)-->

        <!--Page Active Scripts(used by this page)-->

        <!--Page Scripts(used by all page)-->
        <script src="assets/dist/js/sidebar.js"></script>
        <script>
            $('.security_image').change(function(){
                $('.security_image').next("i").css('border','2px solid rgb(0, 128, 0)');
                $('.security_image').next("i").css('color','rgb(0, 128, 0)');
                if($(this).prop("checked") == true){
                    $(this).parent().find('i').css('border','2px solid #b212e6');
                    $(this).parent().find('i').css('color','#b212e6');
                }
            })
            $('.type').change(function(){
                $('.type').next("i").css('border','2px solid rgb(0, 128, 0)');
                $('.type').next("i").css('color','rgb(0, 128, 0)');
                if($(this).prop("checked") == true){
                    $(this).parent().find('i').css('border','2px solid #b212e6');
                    $(this).parent().find('i').css('color','#b212e6');
                }
            });
            var chp = 0;
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                if (chp==0){
                    $(this).closest("div").find("input").attr("type","text");
                    chp = 1;
                }else{
                    $(this).closest("div").find("input").attr("type","password");
                    chp = 0;
                }

            });
        </script>
    </body>
</html>
