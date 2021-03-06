<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('meta.default')
    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">
    {{-- Main CSS --}}
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet"/>
    {{--Datatable--}}
    <link rel="stylesheet" href="{{ mix('css/dataTables.bootstrap4.css') }}">
    {{--select2--}}
    <link rel="stylesheet" href="{{ mix('css/select2.css') }}">
    {{--table css--}}
    <link rel="stylesheet" href="{{ mix('css/table.css') }}">
    {{--Local css--}}
    @yield('localcss')
</head>

<body id="page-top">

{{--php script--}}
@yield('localphp')

{{-- Page Wrapper --}}
<div id="wrapper">
    {{--Main Content--}}
    <div id="content-wrapper" class="d-flex flex-column min-vh-100">

        {{--Main Content--}}
        <div id="content">

            {{--Navbar--}}
            @include('partials.backend.navbar_visual_grafis')

            {{--Page Content--}}
            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

        {{--footer--}}
        @include('partials.backend.footer')

    </div>
</div>

{{--Scroll to Top Button--}}
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    <span class="d-none">to top</span>
</a>

{{--Logout Modal--}}
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">
                    Keluar dari aplikasi?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-4">
                    Pilih tombol <span class="text-secondary font-weight-bold">"Logout"</span> dibawah jika anda ingin
                    mengakhiri session
                    anda.
                </p>
                <hr>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-light mr-2" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-lims-gradient px-2" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--modals--}}
@yield('modals')

{{--Bootstrap core JavaScript--}}
<script src="{{ mix('js/app.js') }}"></script>

{{--Custom scripts for all frontendpages--}}
<script src="{{ mix('js/backend.js') }}" defer></script>

{{--select2--}}
<script src="{{ asset('js/select2.min.js') }}" defer></script>

{{--jSignature--}}
<script src="{{ asset('js/jSignature.min.js') }}"></script>

{{--dataTable--}}
<script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" defer></script>

{{--local script--}}
@yield('localscript')

</body>
</html>
