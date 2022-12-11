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
                                <li class="active breadcrumb-item"><a href="{{ route('add') }}" class="fw-normal">{{ $title 
                                }}</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="bg-white rounded p-2 py-3 mb-5">
                    <div class="row">
                        <div class="col-6">
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
                        <div class="col-6">
                            <h4>List Url Lama: </h4>
                            <div class="row">
                                   @foreach ($datadb as $list)
                                   <div class="col-lg-6">
                                    <label for="urllama">Url</label>
                                       <a href="{{ $list->url }}" target="_blank" class="form-control" @disabled(true)>Url Website</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="urllama">Title</label>
                                            <input type="url" class="form-control" value="{{ $list->title_judul }}" disabled/>
                                    </div>
                                    <span class="mt-2">
                                        
                                        @if ($list->status == "Hoax")
                                            <p class="bg-danger p-2 rounded text-white w-25 text-center">Status Hoax</p>
                                        @endif
                                        @if ($list->status == "Real")
                                            <p class="bg-success p-2 rounded text-white w-25 text-center">Status Terbukti</p>
                                        @endif
                                        @if ($list->status == "Waspada")
                                            <p class="bg-info p-2 rounded text-white w-25 text-center">Status Waspada</p>
                                        @endif
                                   @endforeach
                            </div>
                        </div>
                    </div>
                    <form class="mt-4 updateinformasialamat">
                        <?php
                        if (is_array($datadb) || is_object($datadb)) {
                            foreach ($datadb as $key => $viewdata) {;?>
                            <input type="hidden" value="{{$viewdata->id}}" id="idalamat"/>
                             <div class="row">
                                <div class="col-4 col-lg-4">
                                    <label class="form-label">Pilih Judul Url Baru</label>
                                    <select class="form-control titlebaru" id="judul_title">
                                    </select>
                                </div>
                                <div class="col-4 col-lg-4">
                                    <label class="form-label">Url Website Baru</label>
                                    <select class="form-control" id="url_web_kebenaran">
                                    </select>
                                </div>
                                <div class="col-4 col-lg-4">
                                    <label for="statuspt" class="form-label">Status Kebenaran</label>
                                    <select class="form-control statuspt" name="statuspt" >
                                        <option value="">Pilih Status</option>
                                        <option value="Hoax">Hoax</option>
                                        <option value="Real">Terbukti/No Hoax</option>
                                        <option value="Waspada">Waspada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="judulbaru">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="namaptbaru" value="{{ $viewdata->nama_perusahaan}}"/>
                            </div>
                            <div class="form-group mb-3">
                                <textarea id="viewalamat" name="alamatbaru">{{html_entity_decode($viewdata->alamat)}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Alamat</button>
                            <?php
                            }
                        } 
                        ;?>
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
        CKEDITOR.replace('viewalamat',{
            width:'100%',
            resize:true
        });
        </script>

    <script src="{{ asset('js/sweetaalert.min.js') }}"></script>
    

</body>
</html>