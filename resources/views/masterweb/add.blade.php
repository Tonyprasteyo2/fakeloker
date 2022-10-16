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
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('vendor/images/logo-icon.png')}}" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('vendor/images/logo-icon.png')}}" alt="homepage" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="{{ asset('vendor/images/logo-icon.png')}}" alt="user-img" width="36"
                                    class="img-circle">
                                    <span class="text-white font-medium">asd</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
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
                        <h4 class="page-title">{{ $title }}</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li class="breadcrumb-item"><a href="masterweb">Dashboard</a></li>
                                <li class="active breadcrumb-item"><a href="add" class="fw-normal">{{ $title 
                                }}</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-6 d-flex align-items-center ">
                        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#uploadmasal" aria-label="upload massal" type="button">
                            <i class="fa fa-plus"></i>
                            Upload Massal
                        </button>
                        <div class="modal fade" id="uploadmasal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Upload Alamat</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>lorem</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 position-relative">
                        <form class="cari_gugel mb-3" method="GET" onsubmit="return carigugel(event)">
                            <label class="form-label">
                                Search Google :
                            </label>
                                <input type="text" name="cari_alamat_gugel" class="form-control ketik_gugel position-relative w-75" placeholder="Search Google"/>
                            <div class="position-absolute d-flex align-items-center  h-100" style="top: 0;right:0;">
                                <button type="submit" class="btn btn-primary">Search Google</button>
                            </div>
                        </form>                        
                    </div>
                </div>
                <div class="p-2 bg-white text-dark mb-5 rounded shadow bg-body">
                    <form method="POST" onsubmit="return addinformasi(event)">
                        <div class="mb-5 w-100 d-inline-block">
                            <div class="bg-white bg-body shadow-sm d-inline w-50 p-2 float-end rounded">
                                <h4>List Url :</h4>
                                <div class="row">
                                    <div class="col-6 col-lg-6">
                                        <label class="form-label">Pilih Judul Url</label>
                                        <select class="form-control" id="judul_web_gugel" name="judul_title_gugel"></select>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <label class="form-label">Url</label>
                                        <select class="form-control" id="url_web_kebenaran" name="urlpt">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6">
                                <label for="namapt" class="form-label">Nama Perusaaan</label>
                                <input type="text" class="form-control" id="namapt" placeholder="Masukan nama perusaaan" name="namapt"/>
                            </div>
                            <div class="col col-lg-6">
                                <label for="statuspt" class="form-label">Status Lowongan</label>
                                <select class="form-control statuspt" name="statuspt">
                                    <option value="">Pilih Status</option>
                                    <option value="Hoax">Hoax</option>
                                    <option value="Real">Terbukti/No Hoax</option>
                                </select>
                            </div>
                        </div>
                        <label class="form-label">Alamat Perusahaan</label>
                        <textarea class="alamatpt mb-3" name="alamatpt" required>aa</textarea>
                        <button type="submit" class="btn btn-primary mt-3">Add</button>
                    </form>
                </div>
            </div>
            <footer class="footer text-center">©Kebenaran
            </footer>
        </div>
        @include('layout.keluar')
    </div>
    @include('layout.footer')

    <script type="text/javascript" src="{{asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
    CKEDITOR.replace('alamatpt',{
        width:'100%',
        resize:true
    });
    </script>
</body>
</html>