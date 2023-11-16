<!doctype html>
<html lang="en">
<head>
    <META NAME="robots" CONTENT="noindex,nofollow">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name') }} Admin Panel">
    <meta name="author" content="Admin">
    <title>Admin - {{ config('app.name') }}</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="">
    <!--Global Styles(used by all pages)-->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
    <link href="assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Third party Styles(used by this page)-->

    <!--Start Your Custom Style Now-->
    <link href="assets/dist/css/style.css" rel="stylesheet">
    <link href="assets/dist/css/custom.css" rel="stylesheet">
</head>
<body class="" style="background-color: #2E5BA5;">
<div class="d-flex align-items-center justify-content-center text-center">
    <div class="form-wrapper m-auto">
        <div class="form-container my-4">
            <div class="panel">
                <div class="panel-header text-center mb-3">
                    <div class="register-logo text-center mb-4 d-flex justify-content-center">
                        <img src="" alt="Auto Parts" height="50">
                    </div>
                    <p class="text-muted text-center mb-0">Nice to see you! Please log in with your account.</p>
                </div>
                @if(Session::has('error'))
                    <div class="container mt-3 mb-3">
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! Session('error') !!}</strong>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="container mt-3 mb-3">
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $error }}</strong>
                            </div>
                        </div>
                    @endforeach
                @endif
                <form class="register-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" id="email_address" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="pass" placeholder="Password">
                        <span toggle="#password-field" class="fa fa-fw field-icon toggle-password fa-eye"></span>
                    </div>
                    @php
                        $shuffle_img = get_security_img();
                      shuffle($shuffle_img);
                      $i = 1;
                    @endphp
                    {{--<p class="loginsuccess">Select Your Security Image &nbsp;
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
                    @endif--}}
                    <button type="submit" class="btn btn-block" style="background-color: #2E5BA5;color: white;">Log In</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.End of form wrapper -->
<!--Global script(used by all pages)-->
<script src="assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
<script src="assets/dist/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
</body>
</html>
<script>
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
