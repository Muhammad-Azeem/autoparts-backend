<!doctype html>
<html lang="en">
<head>
    <META NAME="robots" CONTENT="noindex,nofollow">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Samaa News Admin Panel">
    <meta name="author" content="Admin">
    <title>{{ config('app.name') }} - Admin</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/favicon.ico') }}">
    <!--Global Styles(used by all pages)-->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/typicons/src/typicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/themify-icons/themify-icons.min.css') }}" rel="stylesheet">
    <!--Third party Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!--Start Your Custom Style Now-->
    <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/custom.css') }}" rel="stylesheet">
    <!--Third party Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2-bootstrap4/dist/select2-bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2-bootstrap4/dist/select2-bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/jquery.sumoselect/sumoselect.min.css') }}" rel="stylesheet">
    @if(request()->segment(2) === 'create-story')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    @endif
    @if(request()->segment(2) === 'story-list' || request()->segment(2) === 'research')
        <link href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    @endif
    @if(request()->segment(2) === 'story-list' || request()->segment(2) === 'users' || request()->segment(2) === 'comments')
        <link href="{{ asset('assets/plugins/icheck/skins/all.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css') }}" rel="stylesheet">
    @endif
    <!--Third party Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2-bootstrap4/dist/select2-bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/jquery.sumoselect/sumoselect.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/select.html') }}" rel="stylesheet" type="text/css"/>

    <style>
        .bg-success{
            background-color: #2e5ba5 !important;
        }
        .btn-success{
            color: white !important;
            background-color: #2e5ba5 !important;
            box-shadow: 0 2px 6px 0 #2E5BA5 !important;

        }
        outline{
            color: #2E5BA5 !important;
        }
        #blah{
            border-radius: 10px;
        }
        .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b:before {
            display: none;
        }
        #editor_container{
            display: none;
        }
        .SumoSelect{
            width: 100%;
        }
        .tox-statusbar__branding a{
            display: none;
        }
        @if(request()->segment(2) == "create-story")
            #lp-message blockquote > p {
            width: 100%;
            float: none;
            margin: 30px 0;
            padding: 10px 20px;
            background: #fff;
            border-left: 5px solid #2E5BA5;
            font-size: 22.5px;
        }
        @endif
        .input_wrapper{
            width: 80px;
            height: 40px;
            position: relative;
            cursor: pointer;
        }

        .input_wrapper input[type="checkbox"]{
            width: 80px;
            height: 40px;
            cursor: pointer;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: #C82733;
            border-radius: 2px;
            position: relative;
            outline: 0;
            -webkit-transition: all .2s;
            transition: all .2s;
        }

        .input_wrapper input[type="checkbox"]:after{
            position: absolute;
            content: "";
            top: 3px;
            left: 3px;
            width: 34px;
            height: 34px;
            background: #dfeaec;
            z-index: 2;
            border-radius: 2px;
            -webkit-transition: all .35s;
            transition: all .35s;
        }

        .input_wrapper svg{
            position: absolute;
            top: 44%;
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            fill: #fff;
            -webkit-transition: all .35s;
            transition: all .35s;
            z-index: 1;
        }
        .input_wrapper .is_checked{
            width: 18px;
            left: 18%;
            -webkit-transform: translateX(190%) translateY(-30%) scale(0);
            transform: translateX(190%) translateY(-30%) scale(0);
        }

        .input_wrapper .is_unchecked{
            width: 15px;
            right: 16%;
            -webkit-transform: translateX(0) translateY(-30%) scale(1);
            transform: translateX(0) translateY(-30%) scale(1);
        }

        /* Checked State */
        .input_wrapper input[type="checkbox"]:checked{
            background: #2E5BA5;
        }

        .input_wrapper input[type="checkbox"]:checked:after{
            left: calc(100% - 37px);
        }

        .input_wrapper input[type="checkbox"]:checked + .is_checked{
            -webkit-transform: translateX(0) translateY(-30%) scale(1);
            transform: translateX(0) translateY(-30%) scale(1);
        }

        .input_wrapper input[type="checkbox"]:checked ~ .is_unchecked{
            -webkit-transform: translateX(-190%) translateY(-30%) scale(0);
            transform: translateX(-190%) translateY(-30%) scale(0);
        }

        /* Switch 4 Specific Style End */
        .checkbo{
            display: none;
        }
        .des{
            display: block;
            background: white;
            border: 2px solid #C82733;
            border-radius: 9px;
            padding: 5px 8px;
            margin-bottom: 1rem;
            text-align: center;
            box-shadow: 0px 3px 10px -2px rgb(161 170 166 / 50%);
            position: relative;
            color: #777;
            cursor: pointer;
        }
        .chk input[type="checkbox"]:checked + .des {
            background: #C82733;
            color: white;
            cursor: pointer;
            border-color: #C82733;
        }
    </style>
</head>
<body class="fixed" >
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<div class="wrapper" {{ (request()->segment(2) === 'add-story') ? 'style= display:inline-block' : '' }}>
    <!-- Sidebar  -->
    <nav class="sidebar sidebar-bunker {{ (request()->segment(2) === "create-story") ? "active" : "" }}">
        <div class="profile-element d-flex align-items-center flex-shrink-0">
            <div class="avatar online">
                <a href="" target="_blank"><img src="" class="img-fluid" alt="Auto Parts"></a>
            </div>
            <div class="profile-text">
                <h6 class="m-0">{{ \Illuminate\Support\Facades\Auth::user()->dname ?? 'Admin' }}</h6>
                <span><a class="text-white" href="" target="_blank">View Website</a></span>
            </div>
        </div>
        <div class="sidebar-body">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <li class="nav-label">Main Menu</li>
                    <li class="{{ (request()->segment(2) === 'dashboard')? 'mm-active' : '' }}"><a href="{{ route('dashboard') }}"><i class="typcn typcn-home-outline mr-2"></i> Dashboard</a></li>
                    <li class="{{ (request()->segment(2) === 'home-settings')? 'mm-active' : '' }}">
                        <a href="" aria-expanded="true"><i class="typcn typcn-device-desktop mr-2"></i> Home Page</a>
                    </li>
                    <li class="{{ (request()->segment(2) === 'create-story' || request()->segment(2) === 'create-classification' || request()->segment(2) === 'story-list' || request()->segment(2) === 'classification-list')? 'mm-active' : '' }}">
                        <a class="has-arrow material-ripple" href="#">
                            <i class="typcn typcn-th-list mr-2"></i>
                            Products
                        </a>
                        <ul class="nav-second-level">
                            <li class="{{ (request()->segment(2) === 'add-product')? 'mm-active' : '' }}"><a href="{{ route('product') }}">Add Product</a></li>
                            <li class="{{ (request()->segment(2) === 'add-category')? 'mm-active' : '' }}"><a href="{{ route('addCategory') }}">Add Category</a></li>
                            <li class="{{ (request()->segment(2) === 'product-list')? 'mm-active' : '' }}"><a href="{{ route('productList') }}">Product List</a></li>
                            <li class="{{ (request()->segment(2) === 'category-list')? 'mm-active' : '' }}"><a href="{{ route('categoryList') }}">Category List</a></li>
                        </ul>
                    </li>
                    <li class="insert-media">
                        <a href="" class="md-btn"><i class="typcn typcn-image mr-2"></i> Media  </a>
                    </li>
                    <li class="">
                        <a class="material-ripple" href="">
                            <i class="fas fa-user mr-2"></i>
                            Customers
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow material-ripple" href="#">
                            <i class="typcn typcn-chart-bar mr-2"></i>
                            Sales
                        </a>
                        <ul class="nav-second-level">
                            <li class=""><a href="">Orders</a></li>
                            <li class=""><a href="">Reports</a></li>
                            <li class=""><a href="">Order Status</a></li>
                            <li class=""><a href="">Order Settings</a></li>
                        </ul>
                    </li>
                    <script>
                        $('a.md-btn').click(function(event){
                            event.preventDefault();
                            //do whatever
                        });
                    </script>
                    <li class="{{ (request()->segment(2) === 'edit-user')? 'mm-active' : '' }}"><a href=""><i class="typcn typcn-user mr-2"></i> Profile</a></li>
                    <li class="">
                        <a href="" aria-expanded="true" style="background-color: darkred;border-radius: 10px;"><i class="typcn typcn-power"></i> Logout</a>
                    </li>
                </ul>
            </nav>
        </div><!-- sidebar-body -->
    </nav>
    <div class="content-wrapper">
        <div class="main-content">
                        <nav class="navbar-custom-menu navbar navbar-expand-lg m-0 {{ (request()->segment(2) === "create-story") ? "active" : "" }}">
                            <div class="sidebar-toggle-icon" id="sidebarCollapse">
                                sidebar toggle<span></span>
                            </div>
                            <div class="d-flex flex-grow-1 justify-content-center">
                                <img src="" height="50">
                            </div>
            </nav><!--/.navbar-->
