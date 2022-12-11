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

                <div class="row mb-3">
                    <div class="col-6 d-flex align-items-center ">
                        <a class="btn btn-primary " aria-label="upload massal" href="add_masal">
                            <i class="fa fa-plus"></i>
                            Upload Massal
                        </a>
                    </div>
                    <div class="col-6 position-relative">
                        <div id="alert_search"></div>
                        <form class="cari_gugel mb-3" onsubmit="return carigugel(event)">
                            <div class="row">
                                <div class="col-8 ">
                                    <label class="form-label">
                                        Search Google :
                                    </label>
                                        <input type="text" name="cari_alamat_gugel" class="form-control ketik_gugel position-relative w-100" placeholder="Search Google"/>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary mt-4">Search Google</button>
                                </div>
                            </div>
                        </form>                      
                    </div>
                </div>

                <div class="p-2 bg-white text-dark mb-5 rounded shadow bg-body">
                    <form onsubmit="return addinformasi(event)" >
                        
                    <div class="mb-5 w-100 d-inline-block">
                        <div class="bg-white bg-body shadow-sm d-inline w-50 p-2 float-end rounded">
                            <h4>List Url :</h4>
                            <div class="row">
                                <div class="col-6 col-lg-6">
                                    <label class="form-label">Pilih Judul Url</label>
                                    <select class="form-control" id="judul_title" name="judul_title" >
                                    </select>
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
                                <input type="text" class="form-control" id="namapt" placeholder="Masukan nama perusaaan" name="namapt" required/>
                            </div>
                            <div class="col col-lg-6">
                                <label for="statuspt" class="form-label">Status Kebenaran</label>
                                <select class="form-control statuspt" name="statuspt" >
                                    <option value="">Pilih Status</option>
                                    <option value="Hoax">Hoax</option>
                                    <option value="Real">Terbukti/No Hoax</option>
                                    <option value="Waspada">Waspada</option>
                                </select>
                            </div>
                        </div>
                        <label class="form-label">Alamat Perusahaan</label>
                        <textarea class="alamatpt mb-3" name="alamatpt"></textarea>
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
    

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

</body>
</html>