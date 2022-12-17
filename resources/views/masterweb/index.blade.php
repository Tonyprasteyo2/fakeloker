<!DOCTYPE html>
<html lang="en">
<head>

    @include('layout.main_css')

</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        
        @include('layout.header')

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                @include('layout.menu')
                <!-- End Sidebar navigation -->
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Visit</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success">{{ $totalVisit->count() }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Alamat</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple">{{ $totalalamat }}</span></li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Total Statsik Pengunjung</h3>
                            <div class="d-md-flex">
                                <ul class="list-inline d-flex ms-auto">
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-info"></i>Statik</h5>
                                    </li>
                                </ul>
                            </div>
                            <div id="ct-visits" style="height: 405px;">
                                <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span
                                        class="chartist-tooltip-value">6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Pesan Visitor</h3>
                            </div>
                            s
                        </div>
                    </div>
                </div>
                
            </div>
            <footer class="footer text-center">©Kebenaran
            </footer>
        </div>

        

        @include('layout.keluar')
        
    </div>

    @include('layout.footer')

    <script src="{{asset('vendor/bower_components/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('vendor/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>


    <script>
        $(function () {
        "use strict";
        // ============================================================== 
        // Newsletter
        // ============================================================== 
        //ct-visits
        new Chartist.Line('#ct-visits', {
            labels: [
                "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"
            ],
            series: [
                {{ json_encode($visit) }}
            ]
        }, {
            top: 0,
            low: 1,
            showPoint: true,
            fullWidth: true,
            plugins: [
                Chartist.plugins.tooltip()
            ],
            axisY: {
                labelInterpolationFnc: function (value) {
                    return (value / 1) + 'k';
                }
            },
            showArea: true
        });
        var chart = [chart];
        
        });

        </script>


</body>
</html>