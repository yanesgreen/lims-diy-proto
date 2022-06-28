@extends('layouts.frontend.welcome')

@section('section')
    <main class="d-flex">
        <div class="container">
            <div class="row h-100">

                {{--left--}}
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                    <div class="d-none d-md-block mb-2">
                        <small class="rounded bg-primary-50 text-white font-weight-bold p-2">
                            Laboratory Information Management System
                        </small>
                    </div>
                    <h1 class="display-4 spacing-wide font-weight-bold mb-2 mb-lg-4 align-self-center align-self-md-start text-white">
                        LIMS
                        <span class="d-none d-md-inline text-white-50">PUSSANSIAD</span>
                    </h1>
                    <p class="text-white mb-5 mb-lg-3 align-self-center align-self-md-start text-center text-md-left">
                        LIMS adalah aplikasi untuk mengelola aliran sampel dan data barang bukti laboratorium forensik.
                        LIMS
                        membantu menstandarkan alur kerja, pengujian dan prosedur, serta memberikan kontrol proses yang
                        akurat.
                    </p>
                    @auth
                        <a class="btn btn-primary btn-login shadow align-self-center align-self-md-start"
                           href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    @else
                        <a class="btn btn-primary btn-login shadow align-self-center align-self-md-start"
                           href="{{ route('login') }}">
                            Login
                        </a>
                    @endauth
                </div>

                {{--right--}}
                <div class="d-none d-lg-flex col-lg-6 justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-center w-80">
                        @include('svg.animated_banner')
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
