﻿@extends('admin.layouts.main')

@section('content')
    <!--/.Content Header (Page header)-->
    <div class="body-content">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="typcn typcn-chart-bar"></i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Orders</p>
                        <h3 class="card-title fs-18 font-weight-bold">{{ $order_count }}
                        </h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            Total Orders
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="typcn typcn-home-outline"></i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Categories</p>
                        <h3 class="card-title fs-21 font-weight-bold">{{ $cat_count }}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            Total Categories
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="typcn typcn-shopping-cart"></i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Products</p>
                        <h3 class="card-title fs-21 font-weight-bold">{{ $pro_count }}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            Total Products
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="fa fa-users"></i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Customers</p>
                        <h3 class="card-title fs-21 font-weight-bold">{{ $customer_count }}</h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            Total Customers
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="header bg-white pb-4">
                    <!-- Body -->
                    @php
                        $viewsController = new \App\Http\Controllers\viewsController;
                        $current_Date = $viewsController->adsViews();
                        $current_Month = $viewsController->adsViews('monthly');
                        $current_yearly = $viewsController->adsViews('annually');
                    @endphp
                    <script src="https://xrays.io/admin-assets/dist/js/Chart.min.js"></script>
                    <template class="vw-cr-mn">@json($current_Date)</template>
                    <template class="vw-cr-yr">@json($current_Month)</template>
                    <template class="vw-cr-an">@json($current_yearly)  </template>
                    <div class="header-body mb-4">
                        <div class="row align-items-end">
                            <div class="col">
                                <!-- Pretitle -->
                                <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1"> Overview </h6>
                                <!-- Title -->
                                <h1 class="header-title fs-21 font-weight-bold"> VIEWS </h1>
                            </div>
                            <div class="col-auto">
                                <!-- Nav -->
                                <ul class="nav nav-tabs header-tabs c-nav">
                                    <li class="nav-item"> <a  data-v="daily" id="daily" class="nav-link text-center active ___vw_dsb" data-m="current_month">
                                            <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1"> Daily </h6>
                                            <h3 class="mb-0 fs-16 font-weight-bold">{{array_sum($current_Date["data1"])}}</h3>
                                        </a> </li>
                                    <li class="nav-item"> <a  id="1" data-v="monthly" class="nav-link text-center ___vw_dsb" data-m="monthly">
                                            <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1"> Monthly </h6>
                                            <h3 class="mb-0 fs-16 font-weight-bold">{{array_sum($current_Month["data1"])}}</h3>
                                        </a> </li>
                                    <li class="nav-item"> <a  id="1" data-v="yearly" class="nav-link text-center ___vw_dsb" data-m="annually">
                                            <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1"> Yearly </h6>
                                            <h3 class="mb-0 fs-16 font-weight-bold">{{array_sum($current_yearly ["data1"])}}</h3>
                                        </a> </li>
                                </ul>
                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                    <!-- / .header-body -->
                    <!-- Footer -->
                    <div class="header-footer">

                        <div class="col-lg-12">
                            <div id="vclear-chart" class="vchartreport">
                                <canvas id="vlineChart" height="150" style="display: block; width: 483px; height: 225px;" width="483" class="vchartjs-render-monitor"></canvas>
                            </div>
                        </div>
                        <script>
                            function _____vchart(labels, d1){
                                var lineData = {
                                    labels:  labels,
                                    datasets: [
                                        {
                                            label: "Website Views",
                                            fillColor: "rgba(0,128,0,0.2)",
                                            pointColor: "rgba(0,128,0,1)",
                                            backgroundColor: 'rgba(0,128,0,0.4)',
                                            pointBackgroundColor: "rgba(0,128,0,0.9)",
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
                            var d = @json($current_Date);
                            console.log(d);
                            _____vchart(d["labels"], d["data1"]);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".___vw_dsb").click(function(){
            $(".___vw_dsb").removeClass("active");
            $(this).addClass("active");
            var m = $(this).attr("data-m");
            var d = {};
            if (m==="current_month"){
                d = JSON.parse($(".vw-cr-mn").html());
            }else if(m==="monthly"){
                d = JSON.parse($(".vw-cr-yr").html());
            }else{
                d = JSON.parse($(".vw-cr-an").html());
            }
            _____vchart(d["labels"], d["data1"]);
        });
    </script>
@endsection
