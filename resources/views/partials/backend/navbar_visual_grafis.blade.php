<header class="bg-primary py-3 shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <img src="{{ asset('images/bareskrim.png') }}" alt="logo Bareskrim" style="height: 55px">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/smile-logo.svg') }}" alt="logo LIMS" style="height: 40px">
        </a>
        <img src="{{ asset('images/puslabfor-480.png') }}" alt="logo Puslabfor" style="height: 55px">
    </div>
</header>

<nav class="navbar navbar-expand navbar-dark topbar mb-0 static-top">

    {{--Topbar Navbar--}}
    <ul class="navbar-nav ml-auto">

        {{--Nav Item - User Information--}}
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-label="dropdown menu" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-primary small text-capitalize">
                    {{ Auth::user()->nama }}
                </span>
                @if (Auth::user()->foto)
                    <img class="img-profile rounded-circle avatar"
                         alt="profile image"
                         src="{{ asset('storage/avatars/' . Auth::user()->foto) }}">
                @else
                    <img class="img-profile rounded-circle avatar"
                         alt="profile image"
                         src="{{ asset('images/picture_profile/default.png') }}">
                @endif
            </a>
            {{--Dropdown - User Information--}}
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item btn-dropdown" href="{{ route('profile.index', Auth::user()->id) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Profil</span>
                </a>
                <hr>
                <a class="dropdown-item font-weight-bold text-warning btn-dropdown" href="#" data-toggle="modal"
                   data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>

</nav>
