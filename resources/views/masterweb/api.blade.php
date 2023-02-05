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
                        <h4 class="page-title">Api Key</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li class="breadcrumb-item"><a href="{{ route('masterweb') }}">Dashboard</a></li>
                                <li class="active breadcrumb-item"><a href="{{route('api')}}" class="fw-normal">Api Key</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="bg-white p-3 rounded">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <h3>Api Key</h3>
                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#api">
                                Ubah Api Key
                            </button>
                            <button type="button" class="btn btn-primary mt-2 webapi" onclick="showapi()">
                                Lihat Balance
                            </button>
                            <div class="form-group mt-4">
                                <input type="text" class="form-control" value="{{$pisahstring}}" readonly >
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="api" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Api Key</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('updateapi')}}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                        <label>Api Key</label>
                                        <input type="text" class="form-control" value="{{$pisahstring}}" name="api" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                           <header id="showwebapi"></header>
                           <header id="showwebapidata" class="d-none">
                            <div class='container p-2 py-2'>
                                <h2 class='text-center text-capitalize'>selamat datang</h2>
                                <p class="text-center fs-5 text-capitalize">Apabila data tidak muncul,silakan refresh dan login kembali</p>
                                <div class='mt-3 container mx-auto '>
                                    <div class='row'>
                                        <div class='col-lg-6 col-12 text-white'>
                                            <div class='card border-left-primary shadow h-100 py-2'>
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Poin</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="kredit">
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="far fa-money-bill-alt fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-lg-6 col-12 text-white'>
                                            <div class='card border-left-primary shadow h-100 py-2'>
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Total Poin digunakan</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="gunakanapi">
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-archive fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <section class="mt-4">
                                        
                                        <h5 class="fs-5">Api Key</h5>
                                        <div class="shadow p-3 mb-5 bg-white rounded w-50 position-relative">
                                            <div class="mb-2 position-relative">
                                                <section class="position-absolute h-auto p-2 d-inline-flex align-items-center" style="z-index: 100;right:20px;cursor: pointer;">
                                                    <i class="fa fa-eye" style="font-size: 20px;" onclick="showpas()"></i>
                                                </section>
                                                <input type="password" id="lihatapikey" class="form-control position-relative">
                                                <input type="hidden" value="awa" class="apakey">
                                            </div>
                                            <div class="p-1">
                                                <button class="btn btn-secondary text-white" onclick="copy()">Copy</button>
                                                <button class="btn btn-success text-white resetapi" >Reset</button>
                                            </div>
                                        </div>

                                    </section>
                                </div>
                            </div>
                           </header>
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
    

    <script src="{{ asset('js/sweetaalert.min.js') }}"></script>

    @include('sweetalert::alert')

    <script>
      let data = JSON.parse('<?php echo $api[0];?>',true);
      let dataa = JSON.parse('<?php echo $api[1];?>',true);
      document.getElementById('kredit').innerHTML = data.creditBalance;
      document.getElementById('gunakanapi').innerHTML = data.totalUsage;
      let api = dataa.apiKey;
      document.getElementById('lihatapikey').value = api;
    </script>
    
</body>
</html>