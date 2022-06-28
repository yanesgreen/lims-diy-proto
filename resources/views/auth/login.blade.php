@extends('layouts.login.default')

@section('content')
    <form id="form-login"
          class="form-signin position-relative"
          method="POST"
          action="{{ route('login') }}">
        @csrf
        <img src="{{ asset('images/pussansiad_512.png') }}" width="100" alt="logo pussansiad">
        <h1 class="font-weight-bolder spacing-widest mt-2 mb-0 mb-0 text-white">
            LIMS
        </h1>
        <h5 class="d-none d-md-block mb-4 text-white font-weight-light">
            PUSAT SANDI & SIBER TNI ANGKATAN DARAT
        </h5>
        <h5 class="d-block d-md-none mb-4 text-white spacing-wide">
            PUSSANSIAD
        </h5>
        @if ( session('failed') )
            <div class="alert mb-login bg-primary-25 text-white-50" role="alert">
                <span class="font-xs font-weight-bold">
                    Login gagal, periksa kembali username & password anda.
                </span>
            </div>
        @endif

        {{--username input--}}
        <label class="sr-only" for="email">Username</label>
        <input id="username" type="text"
               class="form-control form-control-inverse mb-2"
               name="username"
               value="{{ old('username') }}"
               required
               placeholder="Username"
               autofocus autocomplete="off">

        {{--password input--}}
        <div class="form-group position-relative mb-4">
            <label class="sr-only" for="password">Password</label>
            <input id="password"
                   type="password"
                   class="form-control form-control-inverse"
                   name="password"
                   placeholder="Password"
                   required minlength="8" autocomplete="off">
            <span id="see-password" class="position-absolute">
                <img src="{{ asset('images/visibility_off.svg') }}" alt="invisible">
            </span>
        </div>

        {{--submit--}}
        <button id="submit"
                type="submit"
                class="btn btn-lg btn-primary d-flex w-100 justify-content-center align-items-center shadow">
            <small id="login-text" class="font-weight-bold spacing-wide">
                {{ __('LOGIN') }}
            </small>
            <div class="loader" style="display: none"></div>
        </button>

        {{--footer--}}
        <a id="back"
           href="{{ route('landingpage') }}"
           class="text-white-50 text-decoration-none d-block mt-5 mb-1">
            &leftarrow; Kembali ke beranda
        </a>
    </form>
@endsection


@push('scripts')
    <script>
        // ganti visibility
        const seePassword = document.querySelector('#see-password');
        const password = document.querySelector('#password');

        function handler1() {
            seePassword.innerHTML = `<img src="{{ asset('images/visibility.svg') }}" alt="visible">`;
            password.setAttribute('type', 'text');
            this.addEventListener("click", handler2, {once: true});
        }

        function handler2() {
            seePassword.innerHTML = `<img src="{{ asset('images/visibility_off.svg') }}" alt="invisible">`;
            password.setAttribute('type', 'password');
            this.addEventListener("click", handler1, {once: true});
        }

        seePassword.addEventListener("click", handler1);

        // loader
        const formLogin = document.querySelector('#form-login');
        const loginText = document.querySelector('#login-text');
        const loader = document.querySelector('.loader');

        formLogin.addEventListener('submit', function () {
            loginText.style.display = "none";
            loader.style.display = "inherit"
        });
    </script>
@endpush
