<header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="{{ route('masterweb') }}">
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('assets/img/kenali.png')}}" alt="homepage" class="w-25"/>
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="{{ url('foto') }}/{{ Auth::user()->foto}}" alt="user-img" width="36" height="40"
                                    class="img-circle"><span class="text-white font-medium">{{ Auth::user()->nama_lengkap }}</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>