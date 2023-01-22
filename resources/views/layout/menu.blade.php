<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <!-- User Profile-->
        <li class="sidebar-item pt-2">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('masterweb') }}"
                aria-expanded="false">
                <i class="far fa-clock" aria-hidden="true"></i>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <div class="dropdown dropend">
                <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle"
                aria-expanded="false" data-bs-toggle="dropdown" id="menu-informasi">
                    <i class="fa fa-info-circle" ></i>
                    <span class="hide-menu">Informasi</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="menu-informasi">
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-item" href="{{ route('informasi') }}"><i class="fa fa-info-circle"></i>
                        <span>Lihat Informasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-item" href="{{ route('add') }}"><i class="fa fa-plus"></i>
                        <span>Tambah Informasi</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="user"
                aria-expanded="false">
                <i class="fa fa-file-archive" aria-hidden="true"></i>
                <span class="hide-menu">Data User</span>
            </a>
        </li> --}}

        <li class="sidebar-item">
            <div class="dropdown dropend">
                <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle"
                aria-expanded="false" data-bs-toggle="dropdown" id="menu-informasi">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span class="hide-menu">Setting</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="menu-informasi">
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-item" href="{{ route('profil')}}"><i class="fa fa-user"></i>
                        <span>Profil</span>
                        </a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-item" href="{{ route('api')}}"><i class="fa fa-key"></i>
                        <span>Api</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <button class="sidebar-link waves-effect waves-dark sidebar-link dropdown-item" data-bs-toggle="modal" data-bs-target="#keluar" ><i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                        </button>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>