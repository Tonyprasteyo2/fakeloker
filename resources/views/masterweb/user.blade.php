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
                        <h4 class="page-title">Data User</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li class="breadcrumb-item"><a href="masterweb">Dashboard</a></li>
                                <li class="active breadcrumb-item"><a href="user" class="fw-normal">User</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container p-2 mt-4">
                <button class="btn btn-primary mb-2" type="button" data-bs-target="#addmember" data-bs-toggle="modal"> 
                    <i class="fa fa-plus"></i>
                    Tambah User
                </button>
                <div class="modal fade" id="addmember">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title">Add Member</h2>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                            <form method="POST" onsubmit="return addusernew(event)">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control namanew" name="namanew" placeholder="Masukan Nama Lengkap"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control emailnew" name="emailnew" placeholder="Masukan Email Anda"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control pasnew" name="pasnew" placeholder="Masukan Password Anda"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hak Akses</label>
                                        <select class="form-control rolenew" name="role_member">
                                            <option value="admin">Admin</option>
                                            <option value="member">Member</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Buat</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="shadow bg-body rounded p-4 bg-white">
                    <table id="usera" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tanggal Verifikasi</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $hasil)
                                @if ($hasil->role =="member")
                                    <tr>
                                        <td>{{$hasil->tanggal}}</td>
                                        <td>{{ $hasil->nama_lengkap }}</td>
                                        <td>{{$hasil->email}}</td>
                                        <td>
                                            @if ($hasil->aktif == true)
                                            <div class="bg-success p-1 text-center rounded fw-bold text-capitalize text-white">
                                                <h5 style="position: relative;top:3px;letter-spacing:1.3px;">Verifikasi</h5>
                                            </div>
                                            @endif
                                        </td>
                                        <td style="margin: 2px;" class="d-flex justify-content-center gap-2">
                                            <a class="bg-danger text-white p-2 rounded " id="{{$hasil->user_id}}" onclick="DeleteUser(this.id);" name="id">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <button class="btn btn-primary" data-bs-target="#updateview" data-bs-toggle="modal" id="{{$hasil->user_id}}" name="update" onclick="UpdateUser(this.id)">
                                                <i class="fa fa-info-circle"></i>
                                            </button>
                                            <div class="modal fade" id="updateview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="modal-title">
                                                                <h1>View User</h1>
                                                                <p class="btn btn-success p-1 rounded text-capitalize position-absolute float-right fs-5 text-white" style="top:10px;left:39%;" id="role"></p>
                                                            </div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form method="POST" onsubmit="return UserMemberUpdate(event);" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_member" class="id_view"/>
                                                                <div class="form-group mb-1">
                                                                    <label aria-label="nama">Nama Lengkap</label>
                                                                    <input type="text" class="form-control view_nama" name="nama_member"/>
                                                                </div>
                                                                <div class="form-group mb-1">
                                                                    <label aria-label="email">Email</label>
                                                                    <input type="text" class="form-control view_email" name="view_email"/>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-6">
                                                                        <div class="form-group mb-1">
                                                                            <label aria-label="password">Password</label>
                                                                            <input type="text" class="form-control view_pass" name="view_pass"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-6">
                                                                        <div class="form-group mb-1">
                                                                            <label aria-label="password">Level</label>
                                                                            <select class="form-control view_level" name="view_level">
                                                                                <option value="admin">Admin</option>
                                                                                <option value="member">Member</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="{{asset('vendor/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#usera").DataTable({
            responsive: true,
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