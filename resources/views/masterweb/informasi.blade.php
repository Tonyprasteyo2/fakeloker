<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.main_css')

    <link href="{{asset('vendor/datatable/datatables.min.css')}}"/>
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
                <div class="bg-white rounded p-2 py-3 mb-5">
                    <table id="viewinformasi" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>Status Kebenaran</th>
                                <th>Url</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <?php
                        
                        ;?>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($data as $informasi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $informasi->nama_perusahaan }}</td>
                                <td><?php $alamat= html_entity_decode($informasi->alamat);
                                echo substr($alamat,0,50) ;?></td>
                                <td>
                                    @if ($informasi->status === "Hoax" || $informasi->status ==="hoax")
                                         <p class="bg-danger text-white text-center p-1 rounded">Hoax</p>
                                    @else
                                    <p class="bg-info text-white text-center p-1 rounded">Terbukti</p>
                                    @endif
                                </td>
                                <td>
                                    <a target="blank" href="{{ $informasi->url }}" class="bg-primary text-white p-3 rounded text-center">Url</a>
                                </td>
                                <td>
                                    <a id="{{ $informasi->id }}" onclick="deleteinformasi(this.id)" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
                                    <a href="editalamat/<?php echo uniqid($informasi->id) ;?>"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="footer text-center">©Kebenaran
            </footer>
        </div>

        @include('layout.keluar')
        
    </div>

    @include('layout.footer')

    <script src="{{asset('vendor/datatable/datatables.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('js/sweetaalert.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#viewinformasi").DataTable({
                responsive:true,
            });
        });
    </script>
    <style type="text/css">
        .dataTables_filter label{
            display: block;
        }
        .pagination{
            float: right; 
        }
    </style>

</body>
</html>