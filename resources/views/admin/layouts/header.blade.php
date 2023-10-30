<!-- Page Loader -->
@php
    $url = Request::segment(2);
@endphp
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
<div class="wrapper">
    <!-- Sidebar  -->
    <nav class="sidebar sidebar-bunker">
        <div class="profile-element d-flex align-items-center flex-shrink-0">
            <div class="avatar online">
                <img src="{{ asset('assets/img/avatar-6.jpg') }}" class="img-fluid rounded-circle" alt="">
            </div>
            <div class="profile-text">
                <h6 class="m-0">Admin</h6>
                <h6><a href="{{ route('HomeUrl') }}" target="_blank">View Website</a></h6>
            </div>
        </div>
        <div class="sidebar-body">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <li class="nav-label">Main Menu</li>
                    <li class="{{ ($url=="dashboard")?'mm-active':'' }}">
                        <a class="material-ripple" href="{{route('dash')}}">
                            <i class="typcn typcn-home-outline mr-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow material-ripple" href="#">
                            <i class="typcn typcn-mail mr-2"></i>
                            CMS
                        </a>
                        <ul class="nav-second-level">
                            <li class="{{ ($url=="homepage"|| $url=="slider"|| $url=="home-meta")?'mm-active':'' }}"><a href="{{ route('homepage') }}">Home</a></li>
                            <li class="{{ ($url=="contactus")?'mm-active':'' }}"><a href="{{ route('contact_a') }}">Contact Us</a></li>
                            <li class="{{ ($url=="terms")?'mm-active':'' }}"><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fab fa-buysellads mr-2"></i>
                            Products
                        </a>
                        <ul class="nav-second-level">
                            <li class="{{ ($url=="create-product")?'mm-active':'' }}"><a href="{{ route('ad-product') }}">Add New Product</a></li>
                            <li class="{{ ($url=="product-list")?'mm-active':'' }}"><a href="{{ route('product_list') }}">Product List</a></li>
                            <li class="{{ ($url=="create-category")?'mm-active':'' }}"><a href="{{ route('ad_category') }}">Create Category</a></li>
                            <li class="{{ ($url=="category-list")?'mm-active':'' }}"><a href="{{ route('category_list') }}">Category List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow material-ripple" href="#">
                            <i class="typcn typcn-chart-bar mr-2"></i>
                            Sales
                        </a>
                        <ul class="nav-second-level">
                            <li class="{{ ($url=="orders")?'mm-active':'' }}"><a href="{{ route("order") }}">Orders</a></li>
                            <li class="{{ ($url=="reports")?'mm-active':'' }}"><a href="{{ route('reports') }}">Reports</a></li>
                            <li class="{{ ($url=="order-status")?'mm-active':'' }}"><a href="{{ route('order_status') }}">Order Status</a></li>
                            <li class="{{ ($url=="order-settings")?'mm-active':'' }}"><a href="{{ route('order_settings') }}">Order Settings</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow material-ripple" href="#">
                            <i class="typcn typcn-chart-bar mr-2"></i>
                            Emails
                        </a>
                        <ul class="nav-second-level">
                            <li class="{{ ($url=="email-list")?'mm-active':'' }}"><a href="{{ route("email_list") }}">Email List</a></li>
                            <li class="{{ ($url=="send-email")?'mm-active':'' }}"><a href="{{ route('email') }}">Send Emails</a></li>
                        </ul>
                    </li>
                    <li class="{{ ($url=="customers")?'mm-active':'' }}">
                        <a class="material-ripple" href="{{ route('customers') }}">
                            <i class="fas fa-user mr-2"></i>
                            Customers
                        </a>
                    </li>
                    <li><a class="insert-media btn" style=" background-color: transparent !important;border-color: transparent !important;" data-type="" data-for="display" data-return="" data-link=""><i class="typcn typcn-gift mr-2"></i>Media</a></li>
                    <li>
                        <a class="has-arrow material-ripple" href="#">
                            <i class="typcn typcn-device-tablet mr-2"></i>
                            Settings
                        </a>
                        <ul class="nav-second-level">
                            <li class="{{ ($url=="add-size")?'mm-active':'' }}"><a href="{{ route('add-size') }}">Add Size</a></li>
                            <li class="{{ ($url=="general-settings")?'mm-active':'' }}"><a href="{{ route('general') }}">General Setting</a></li>
                            <li class="{{ ($url=="log-book")?'mm-active':'' }}"><a href="{{ route('log-book') }}">Log Book</a></li>
                            <li class="{{ ($url=="login-info")?'mm-active':'' }}"><a href="{{ route('login-info') }}">Login Setting</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div><!-- sidebar-body -->
    </nav>
    <!-- Page Content  -->
    <div class="content-wrapper">
        <div class="main-content">
            <nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
                <div class="sidebar-toggle-icon" id="sidebarCollapse">
                    sidebar toggle<span></span>
                </div><!--/.sidebar toggle icon-->
                <div class="d-flex flex-grow-1">
                    <div class="nav-clock">
                        <div class="time">
                            <span class="time-hours"></span>
                            <span class="time-min"></span>
                            <span class="time-sec"></span>
                        </div>
                    </div><!-- nav-clock -->
                </div>
                <div class="d-flex flex-grow-1">
                    <ul class="navbar-nav flex-row align-items-center ml-auto">
                        <li class="nav-item dropdown user-menu">
                            <a class="nav-link " href="{{  route('logoutadmin') }}" title="Log Out">
                                <span class="typcn typcn-export-outline"></span>
                            </a>
                        </li>
                    </ul><!--/.navbar nav-->

                </div>
            </nav><!--/.navbar-->
