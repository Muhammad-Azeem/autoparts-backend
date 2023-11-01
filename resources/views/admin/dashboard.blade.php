@extends('admin.layouts.main')
@section('content')
    @php
        $Extra = new \App\Http\Controllers\viewsController;
        $views = $Extra->adsViews("current_month");
        $views_m = $Extra->adsViews("monthly");
        $views_y = $Extra->adsViews("annually");
    @endphp
    <!-- Page Content  -->
    <!--/.Content Header (Page header)-->
    <div class="body-content">
        <div class="row">
            <div class="col-12 text-center d-flex justify-content-center">
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box">
                    <div
                        class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center"><i
                                class="typcn typcn-device-tablet"></i></div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold">Classifications</p>
                        <h3 class="card-title fs-18 font-weight-bold">{{ $classification }}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats"> Total Classifications</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box">
                    <div
                        class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center"><i
                                class="hvr-buzz-out far fa-user"></i></div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold">Authors</p>
                        <h3 class="card-title fs-21 font-weight-bold">{{ $authors }}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats"> Total Authors</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box">
                    <div
                        class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center"><i
                                class="hvr-buzz-out fas fa-th-list"></i></div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold">Stories</p>
                        <h3 class="card-title fs-21 font-weight-bold">{{ $this_m_c }}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats"> Current Month Stories</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box">
                    <div
                        class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center"><i
                                class="hvr-buzz-out fas fa-eye"></i></div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold">Views</p>
                        <h3 class="card-title fs-21 font-weight-bold">{{array_sum($views_m['data1'])}}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats"> Current Month Views</div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row mb-3">
            <div class="col-lg-12 col-xl-6">
                <div class="card mb-4">
                    <h3 class="p-3" style="background-color: #152a70;
    color: white;">Website Leaderboard</h3>
                    <div class="card-body text-center">
                        <div class="row justify-content-center">
                            <div class="container">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link active" href="#news">
                                            <icon class="fa fa-home"></icon>
                                            News</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#tags1"><i class="fa fa-user"></i>
                                            Tags</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#author1"><i
                                                class="fa fa-user"></i> Authors</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active py-3" id="news">
                                        <table class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th><h5>#</h5></th>
                                                <th><h5>12pm</h5></th>
                                                <th><h5>1pm</h5></th>
                                                <th><h5>2pm</h5></th>
                                                <th><h5>Today</h5></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @for($z = 1; $z <= 14 ; $z++)
                                                <tr>
                                                    <td><h6>{{ $z }}</h6></td>
                                                    <td>
                                                        <a href="{{ (!empty($arr[0][$i]))? route("home")."/"."20873".$arr[0][$i]->id : '' }}" target="_blank">{{ (!empty($arr[0][$i]))? "20873".$arr[0][$i]->id : '' }}
                                                        </a>
                                                        <p>{{ (!empty($arr[0][$i]))? $arr[0][$i]->views : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ (!empty($arr[1][$i]))? route("home")."/"."20873".$arr[1][$i]->id : '' }}">{{ (!empty($arr[1][$i]))? "20873".$arr[1][$i]->id : '' }}
                                                        </a>
                                                        <p>{{ (!empty($arr[1][$i]))? $arr[1][$i]->views : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ (!empty($arr[2][$i]))? route("home")."/"."20873".$arr[2][$i]->id : '' }}">{{ (!empty($arr[2][$i]))? "20873".$arr[2][$i]->id : '' }}
                                                        </a>
                                                        <p>{{ (!empty($arr[2][$i]))? $arr[2][$i]->views : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ (!empty($arr[3][$i]))? route("home")."/"."20873".$arr[3][$i]->id : '' }}" target="_blank">{{ (!empty($arr[3][$i]))? "20873".$arr[3][$i]->id : '' }}
                                                        </a>
                                                        <p>{{ (!empty($arr[3][$i]))? $arr[3][$i]->views : '' }}</p>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade py-3" id="tags1">
                                        <table class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th><h5>#</h5></th>
                                                <th><h5>12pm</h5></th>
                                                <th><h5>1pm</h5></th>
                                                <th><h5>2pm</h5></th>
                                                <th><h5>MTD</h5></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @for($z = 1; $z <= 14 ; $z++)
                                                <tr>
                                                    <td><h6>{{ $z }}</h6></td>
                                                    <td>
                                                        <a target="_blank" href="{{ (!empty($tags[0][$i]))? route('home') ."/trends/". \Illuminate\Support\Str::slug($tags[0][$i]->tag) : '' }}">{{ (!empty($tags[0][$i]))? $tags[0][$i]->tag : '' }}
                                                        </a>
                                                        <p>{{ (!empty($tags[0][$i]))? $tags[0][$i]->views : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="{{ (!empty($tags[1][$i]))? route('home') ."/trends/". \Illuminate\Support\Str::slug($tags[1][$i]->tag) : '' }}">{{ (!empty($tags[1][$i]))? $tags[1][$i]->tag : '' }}
                                                        </a>
                                                        <p>{{ (!empty($tags[1][$i]))? $tags[1][$i]->views : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="{{ (!empty($tags[2][$i]))? route('home') ."/trends/". \Illuminate\Support\Str::slug($tags[2][$i]->tag) : '' }}">{{ (!empty($tags[2][$i]))? $tags[2][$i]->tag : '' }}
                                                        </a>
                                                        <p>{{ (!empty($tags[2][$i]))? $tags[2][$i]->views : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="{{ (!empty($tags[3][$i]))? route('home') ."/trends/". \Illuminate\Support\Str::slug($tags[3][$i]->tag) : '' }}">{{ (!empty($tags[3][$i]))? $tags[3][$i]->tag : '' }}
                                                        </a>
                                                        <p>{{ (!empty($tags[3][$i]))? $tags[3][$i]->views : '' }}</p>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade py-3" id="author1">
                                        <table class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th><h5>#</h5></th>
                                                <th><h5>12pm</h5></th>
                                                <th><h5>1pm</h5></th>
                                                <th><h5>2pm</h5></th>
                                                <th><h5>Today</h5></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @for($z = 1; $z <= 14 ; $z++)
                                                <tr>
                                                    <td><h6>{{ $z }}</h6></td>
                                                    <td>
                                                        <a href="{{ route('home') }}/{{ (!empty($arr[0][$i]))? "20873".$arr[0][$i]->id : '' }}" target="_blank">{{ (!empty($arr[0][$i]))? "20873".$arr[0][$i]->id : '' }}
                                                        </a>
                                                        <p>{{ (!empty($arr[0][$i]))? $arr[0][$i]->views : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('home') }}/{{ (!empty($arr[1][$i]))? "20873".$arr[1][$i]->id : '' }}" target="_blank">{{ (!empty($arr[1][$i]))? "20873".$arr[1][$i]->id : '' }}
                                                        </a>
                                                        <p>{{ (!empty($arr[1][$i]))? $arr[1][$i]->views : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('home') }}/{{ (!empty($arr[2][$i]))? "20873".$arr[3][$i]->id : '' }}" target="_blank">{{ (!empty($arr[2][$i]))? "20873".$arr[2][$i]->id : '' }}
                                                        </a>
                                                        <p>{{ (!empty($arr[2][$i]))? $arr[2][$i]->views : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('home') }}/{{ (!empty($arr[3][$i]))? "20873".$arr[3][$i]->id : '' }}" target="_blank">{{ (!empty($arr[3][$i]))? "20873".$arr[3][$i]->id : '' }}
                                                        </a>
                                                        <p>{{ (!empty($arr[3][$i]))? $arr[3][$i]->views : '' }}</p>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6">
                <div class="card mb-4">
                    <h3 class="p-3" style="background-color: #152a70;
    color: white;">Website Analytics</h3>
                    <div class="card-body text-center">
                        <div class="row justify-content-center">
                            <div class="container">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link active" href="#twofour">
                                            <icon class="fa fa-chart-line"></icon>
                                            24H</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#sevenfour"><i
                                                class="fa fa-chart-line"></i> 72H</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#authorlat"><i
                                                class="fa fa-user"></i> Author</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active py-3" id="twofour">
                                        <table class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th><h5>#</h5></th>
                                                <th class="col-8"><h5>Story</h5></th>
                                                <th><h5>Views</h5></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @for($z = 1; $z <= 14 ; $z++)
                                                <tr>
                                                    <td><h6>{{ $z }}</h6></td>
                                                    <td>
                                                        <a href="{{ route('home') }}/20873{{ (!empty($today[$i]))? $today[$i]->id : '' }}-{{ (!empty($today[$i]))? $today[$i]->slug : '' }}" target="_blank">
                                                            {{ (!empty($today[$i]))? $today[$i]->title : '' }}@php
                                                            if(!empty($today[$i]->author)){
                                                            $authr = \App\Models\User::where("id","=",$today[$i]->author)->pluck("dname");
                                                            echo '  ━━   '."<p style='font-weight:bolder'>".$authr[0]."</p>";
                                                            }
                                                            @endphp
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <p>{{ (!empty($today[$i]))? $today[$i]->views : '' }}</p>
                                                        <a href="{{ route('create-story') }}?edit={{ (!empty($today[$i]))? $today[$i]->id : '' }}">Edit</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade py-3" id="sevenfour">
                                        <table class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th><h5>#</h5></th>
                                                <th class="col-8"><h5>Story</h5></th>
                                                <th><h5>Views</h5></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @for($z = 1; $z <= 14 ; $z++)
                                                <tr>
                                                    <td><h6>{{ $z }}</h6></td>
                                                    <td>
                                                        <a href="{{ route('home') }}/20873{{ (!empty($seventwo[$i]))? $seventwo[$i]->id : '' }}-{{ (!empty($seventwo[$i]))? $seventwo[$i]->slug : '' }}" target="_blank">{{ (!empty($seventwo[$i]))? $seventwo[$i]->title : '' }}@php
                                                                if(!empty($seventwo[$i]->author)){
                                                                $authr = \App\Models\User::where("id","=",$seventwo[$i]->author)->pluck("dname");
                                                                echo "<span style='font-weight:bolder'> ━━ ".$authr[0]."</span>";
                                                                }
                                                            @endphp
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <p>{{ (!empty($seventwo[$i]))? $seventwo[$i]->views : '' }}</p>
                                                        <a href="{{ route('create-story') }}?edit={{ (!empty($seventwo[$i]))? $seventwo[$i]->id : '' }}">Edit</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade py-3" id="authorlat">
                                        <table class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th><h5>#</h5></th>
                                                <th class="col-8"><h5>Name</h5></th>
                                                <th><h5>Views</h5></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @for($z = 1; $z <= 14 ; $z++)
                                                <tr>
                                                    <td><h6>{{ $z }}</h6></td>
                                                    <td>
                                                        <p style="font-weight: bolder;">{{ !empty($author[$i]->dname) ? $author[$i]->dname : ''  }}</p>
                                                    </td>
                                                    <td>
                                                        @php
                                                        if (!empty($author[$i]->dname)){
                                                        $authViews = \App\Models\story::where("author","=",$author[$i]->id)->get("views");
                                                        $aView = 0;
                                                        foreach ($authViews as $j){
                                                            $aView = $aView + $j->views;
                                                        }
                                                        @endphp
                                                        <p>{{ $aView }}</p>
                                                        @php } @endphp
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-6">
                <div class="card mb-4">
                    <h3 class="p-3" style="background-color: #152a70;
    color: white;">Editor Leaderboard</h3>
                    <div class="card-body text-center">
                        <div class="row justify-content-center pb-4">
                            <div class="container">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link active show" href="#profile2"><i
                                                class="fa fa-newspaper"></i> Stories</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active py-3" id="profile2">
                                        <table class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th><h5>#</h5></th>
                                                <th><h5>Editor</h5></th>
                                                <th><h5>Today</h5></th>
                                                <th><h5>Yest</h5></th>
                                                <th><h5>Month</h5></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @for($z = 1; $z <= 9 ; $z++)
                                                <tr>
                                                    <td><h6>{{ $z }}</h6></td>
                                                    <td>
                                                        <p style="font-weight: bolder;">{{ !empty($author[$i]->dname) ? $author[$i]->dname : ''  }}</p>
                                                    </td>
                                                    <td>
                                                        @php
                                                            if (!empty($author[$i]->dname)){
                                                            $authViews = \App\Models\story::whereDate('created_at', \Carbon\Carbon::today())
                                                            ->where("author","=",$author[$i]->id)->get("views");
                                                            $aView = 0;
                                                            foreach ($authViews as $j){
                                                                $aView = $aView + $j->views;
                                                            }
                                                        @endphp
                                                        <p>{{ $aView }}</p>
                                                        @php } @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            if (!empty($author[$i]->dname)){
                                                            $authViews = \App\Models\story::whereDate('created_at', \Carbon\Carbon::yesterday())
                                                            ->where("author","=",$author[$i]->id)->get("views");
                                                            $aView = 0;
                                                            foreach ($authViews as $j){
                                                                $aView = $aView + $j->views;
                                                            }
                                                        @endphp
                                                        <p>{{ $aView }}</p>
                                                        @php } @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            if (!empty($author[$i]->dname)){
                                                            $authViews = \App\Models\story::whereMonth('created_at', \Carbon\Carbon::now()->month)
                                                            ->where("author","=",$author[$i]->id)->get("views");
                                                            $aView = 0;
                                                            foreach ($authViews as $j){
                                                                $aView = $aView + $j->views;
                                                            }
                                                        @endphp
                                                        <p>{{ $aView }}</p>
                                                        @php } @endphp
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6">
                <div class="card mb-4">
                    <h3 class="p-3" style="background-color: #152a70;
    color: white;">NewsKit Activity</h3>
                    <div class="card-body text-center">
                        <div class="row justify-content-center">
                            <div class="container">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link active show" href="#profile2"><i
                                                class="fa fa-user"></i></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active py-3" id="profile2">
                                        <table class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th><h5>#</h5></th>
                                                <th><h5>Name</h5></th>
                                                <th><h5>Activity</h5></th>
                                                <th><h5>Browser</h5></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @for($z = 1; $z <= 9 ; $z++)
                                                    <tr>
                                                        <td><h6>{{ $z }}</h6></td>
                                                        <td>
                                                            @php
                                                            if (!empty($author[$i]->id)){
                                                                $ii = $author[$i]->id;
                                                            }
                                                            @endphp
                                                            <a href="{{ route('logbook') }}?user={{ (!empty($ii)) ? $ii : '' }}" style="font-weight: bolder;">{{ !empty($author[$i]->dname) ? $author[$i]->dname : ''  }}</a>
                                                        </td>
                                                        <td>
                                                            @php
                                                                if (!empty($author[$i]->id)){
                                                                $authlast = \App\Models\logs::where("users_id","=",$author[$i]->id)->latest()->first();
                                                                (!empty($authlast)) ? $authlast->time : "";
                                                            @endphp
                                                            <p>{{ (!empty($authlast)) ? $authlast->ip : "" }}</p>
                                                            @php } @endphp
                                                        </td>
                                                        <td>
                                                            @php
                                                                if (!empty($author[$i]->id)){
                                                            @endphp
                                                            <p>{{ (!empty($authlast)) ? $authlast->browser : "" }}</p>
                                                            @php } @endphp
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-white p-4" style="">
                    <!-- Body -->
                    <script src="{{ asset('assets/dist/js/Chart.min.js') }}"></script>
                    <template class="vw-cr-mn">@json($views)</template>
                    <template class="vw-cr-yr">@json($views_m)</template>
                    <template class="vw-cr-an">@json($views_y)</template>
                    <div class="header-body mb-4">
                        <div class="row align-items-end">
                            <div class="col">
                                <!-- Pretitle -->
                                <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1"> WEBSITE </h6>
                                <!-- Title -->
                                <h1 class="header-title fs-18 font-weight-bold"> VIEWS </h1>
                            </div>
                            <div class="col-auto">
                                <!-- Nav -->
                                <ul class="nav nav-tabs header-tabs c-nav">
                                    <li class="nav-item"> <a data-v="daily" id="daily" class="nav-link text-center ___vw_dsb active" data-m="current_month">
                                            <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1"> Daily </h6>
                                            <h3 class="mb-0 fs-13 font-weight-bold" style="cursor: default;">{{array_sum($views['data1'])}}</h3>
                                        </a> </li>
                                    <li class="nav-item"> <a id="1" data-v="monthly" class="nav-link text-center ___vw_dsb" data-m="monthly">
                                            <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1"> Monthly </h6>
                                            <h3 class="mb-0 fs-13 font-weight-bold" style="cursor: default;">{{array_sum($views_m['data1'])}}</h3>
                                        </a> </li>
                                    <li class="nav-item"> <a id="1" data-v="yearly" class="nav-link text-center ___vw_dsb" data-m="annually">
                                            <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1"> Yearly </h6>
                                            <h3 class="mb-0 fs-13 font-weight-bold" style="cursor: default;">{{array_sum($views_y['data1'])}}</h3>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                    <!-- / .header-body -->
                    <!-- Footer -->
                    <div class="header-footer">
                        <div class="col-lg-12">
                            <div id="vclear-chart" class="vchartreport"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="vlineChart" height="584" style="display: block; width: 943px; height: 292px;" width="1886" class="vchartjs-render-monitor chartjs-render-monitor"></canvas></div>
                        </div>
                        <script>
                            function _____vchart(labels, d1){
                                var lineData = {
                                    labels:  labels,
                                    datasets: [
                                        {
                                            label: "Website Views",
                                            fillColor: "rgb(21, 42, 112)",
                                            pointColor: "rgb(183,14,40)",
                                            backgroundColor: 'rgb(21, 42, 112)',
                                            pointBackgroundColor: "rgb(183,14,40)",
                                            data: d1
                                        }
                                    ]
                                };
                                var lineOptions = {
                                    responsive: true,
                                    tooltips: {mode: 'index',intersect: false,caretPadding: 20,bodyFontColor: "#000000",bodyFontSize: 14,bodyFontColor: '#FFFFFF',bodyFontFamily: "'Helvetica', 'Arial', sans-serif",footerFontSize: 50,callbacks: {
                                            label: function(tooltipItem, data) {
                                                var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                                if (label) {
                                                    label += ': ';
                                                }
                                                label += tooltipItem.yLabel.toLocaleString();
                                                return label;
                                            }
                                        }},
                                    hover: {mode: 'nearest',intersect: true},
                                    animation: {
                                        duration: 3000,
                                    },
                                    scales: {
                                        yAxes:[{
                                            ticks:{
                                                callback:function(value, index, values){
                                                    return value.toLocaleString();
                                                }
                                            }
                                        }]
                                    }
                                };
                                $("canvas#vlineChart").remove();
                                $("div.vchartreport").append('<canvas id="vlineChart" height="150" style="display: block; width: 483px; height: 225px;" width="483" class="vchartjs-render-monitor"></canvas>');
                                var ctx = document.getElementById("vlineChart").getContext("2d");
                                let draw = Chart.controllers.line.prototype.draw;
                                Chart.controllers.line = Chart.controllers.line.extend({
                                    draw: function() {
                                        draw.apply(this, arguments);
                                        let ctx = this.chart.chart.ctx;
                                        let _stroke = ctx.stroke;
                                        ctx.stroke = function() {
                                            ctx.save();
                                            _stroke.apply(this, arguments)
                                            ctx.restore();
                                        }
                                    }
                                });
                                Chart.defaults.LineWithLine = Chart.defaults.line;
                                Chart.controllers.LineWithLine = Chart.controllers.line.extend({
                                    draw: function(ease) {
                                        Chart.controllers.line.prototype.draw.call(this, ease);
                                        if (this.chart.tooltip._active && this.chart.tooltip._active.length) {
                                            var activePoint = this.chart.tooltip._active[0],
                                                ctx = this.chart.ctx,
                                                x = activePoint.tooltipPosition().x,
                                                topY = this.chart.scales['y-axis-0'].top,
                                                bottomY = this.chart.scales['y-axis-0'].bottom;
                                            // draw line
                                            ctx.save();
                                            ctx.beginPath();
                                            ctx.moveTo(x, topY);
                                            ctx.lineTo(x, bottomY);
                                            ctx.lineWidth = 2;
                                            ctx.strokeStyle = '#07C';
                                            ctx.stroke();
                                            ctx.restore();
                                        }
                                    }
                                });
                                chart = new Chart(ctx, {type: 'LineWithLine', data: lineData, options:lineOptions});
                            }
                            function kFormatter(num) {
                                return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + 'k' : Math.sign(num)*Math.abs(num)
                            }
                            var d = @json($views);
                            _____vchart(d["labels"], d["data1"]);
                        </script>
                    </div>
                </div>
            </div>
        </div>
@endsection
