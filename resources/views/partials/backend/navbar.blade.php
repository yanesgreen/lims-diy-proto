<nav class="navbar navbar-expand navbar-dark topbar mb-4 static-top bg-white shadow">

    {{--Sidebar Toggle (Topbar)--}}
    <button id="sidebarToggleTop" aria-label="toggle button" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars text-primary"></i>
    </button>

    {{--tulisan Lims--}}
    {{--    <p class="mb-0 d-none d-md-block text-primary font-weight-bold" style="letter-spacing: 1px;">--}}
    {{--                Sistem Manajemen Informasi Laboratorium Elektronik--}}
    {{--    </p>--}}

    {{-- tulisan lims u/ mobile  --}}
    <h5 class="mb-0 d-block d-md-none text-primary font-weight-bold" style="letter-spacing: 1px;">
        LIMS
    </h5>

    {{--Topbar Navbar--}}
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        {{--Nav Item - User Information--}}
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-label="dropdown menu" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-primary small text-capitalize">
                    {{ auth::user()->nama }}
                </span>
                <img class="img-profile rounded-circle avatar"
                     alt="profile image"
                     src="{{ asset('images/picture_profile/default.svg') }}">
            </a>
            {{--Dropdown - User Information--}}
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item btn-dropdown" href="{{ route('profile.index', auth::user()->id) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Profil</span>
                </a>
                <hr>
                <a class="dropdown-item font-weight-bold text-secondary btn-dropdown" href="#" data-toggle="modal"
                   data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>

</nav>
