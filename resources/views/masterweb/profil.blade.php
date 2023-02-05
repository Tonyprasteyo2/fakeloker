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
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li class="breadcrumb-item"><a href="masterweb">Dashboard</a></li>
                                <li class="active breadcrumb-item"><a href="profil" class="fw-normal">Profil</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <form method="POST" enctype="multipart/form-data" class="form-horizontal form-material" action="update">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4 col-lg-3 col-md-12">
                            <div class="white-box">
                                <div class="user-bg" style="height: 325px;">
                                    <img src="foto/{{ Auth::user()->foto }}" alt="gambar">
                                    <div class="overlay-box">
                                        <div class="user-content">
                                            <input type="hidden" name="id" value="{{Auth::user()->id}}"/>
                                            <img src="foto/{{ Auth::user()->foto }}" alt="user" class="thumb-lg img-circle view_foto positioin-relative" style="width: 200px;height:190px;"/>
                                                <input type="file" name="foto" id="foto" class="d-none"/>
                                                <div class="position-absolute w-50 h-25 ml-4" style="top: 10%;">
                                                    <label for="foto">
                                                        <img src="{{asset('assets/img/kamera.png')}}" class="w-50" style="cursor: pointer;"/>
                                                    </label>
                                                </div>
                                            <h4 class="text-white mt-2">{{ Auth::user()->nama_lengkap }}</h4>
                                            <h5 class="text-white mt-2">{{Auth::user()->email}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-danger p-1 text-center position-relative close d-none">
                                <strong class="text-white ">File Gambar Harus PNG/JPG</strong>
                                <header class="position-absolute py-1" style="top: 0;cursor: pointer;" onclick="tutup()">
                                    <i class="fas fa-times"></i>
                                </header>
                            </div>
                            <div class="bg-red p-1 text-center position-relative closed bg-warning d-none">
                                <strong class="text-white">Ukuran Foto Terlalu Besar</strong>
                                <header class="position-absolute py-1" style="top: 0;cursor: pointer;" onclick="tutup()">
                                    <i class="fas fa-times"></i>
                                </header>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nama Lengkap</label>
                                        <input class="form-control border-0 p-0 nama" name="nama" value="{{auth::user()->nama_lengkap}}" required/>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Email</label>
                                        <input type="email" class="form-control border-0 email" name="email" value="{{auth::user()->email}}" readonly/>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Status</label>
                                        <input type="text" class="form-control border-0 bg-info p-1 text-white" readonly value="{{ Auth::user()->role }}" placeholder="Disabled input" aria-label="Disabled input "/>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="col-md-12 p-0">Password Lama</label>
                                                <input class="form-control border-0 show" name="pas_lama" type="password" placeholder="Masukan Password Lama" required/>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="col-md-12 p-0">Password Baru</label>
                                                <input class="form-control border-0 show pascek"  name="pas_baru" type="password" placeholder="Masukan Password Baru" required/>
                                                <span class="strong  w-full d-block mt-1 rounded" style="height:5px;
                                                transition:all 1s;width:0px;"></span>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input cek" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                              Show Password
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-success form-control text-white">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <footer class="footer text-center">©Kebenaran
            </footer>
        </div>

        @include('layout.keluar')

    </div>
    @include('layout.footer')

    <script src="{{ asset('js/sweetaalert.min.js') }}"></script>

    @include('sweetalert::alert')

</body>
</html>