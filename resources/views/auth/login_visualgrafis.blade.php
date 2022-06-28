@extends('layouts.login.visual_grafis')

@section('title')
    Login
@endsection

@section('content')
    <form id="form-login" class="form-signin position-relative" method="POST" action="{{ route('login.visual_grafis') }}">
        @csrf
        <img class="d-block mb-3 mx-auto" src="{{ asset('images/puslabfor-480.png') }}" alt="Puslabfor" height="75px">
        <img class="d-inline-block mb-3 logo-smile" src="{{ asset('images/smile-logo.svg') }}" alt="SMILE" width="40%">
        <h6 class="mb-login text-info" style="color: #FED136">{{ \App\UnitKerja::find(unitKerjaId())->nama }}</h6>
        @if ( session('failed') )
            <div class="alert alert-primary mb-login" role="alert">
                <span class="font-xs font-weight-bold">
                    Login gagal, periksa kembali email atau password anda.
                </span>
            </div>
        @endif
        {{--username input--}}
        <label class="sr-only" for="email" class="sr-only">Email address</label>
        <input id="username" type="text"
               class="form-control form-control-inverse mb-2"
               name="username"
               value="{{ old('username') }}"
               required
               placeholder="Username"
               autofocus autocomplete="off">
        {{--password input--}}
        <div class="form-group position-relative mb-4">
            <label class="sr-only" for="password" class="sr-only">Password</label>
            <input id="password"
                   type="password"
                   class="form-control form-control-inverse"
                   name="password"
                   placeholder="Password"
                   required minlength="8" autocomplete="off">
            <span id="see-password" class="position-absolute text-white">
                <img src="{{ asset('images/visibility_off.svg') }}" alt="invisible">
            </span>
        </div>
        {{--submit--}}
        <button id="submit"
                type="submit"
                class="btn btn-lg btn-lims-gradient d-flex w-100 justify-content-center align-items-center">
            <span id="login-text">{{ __('Login') }}</span>
            <div class="loader" style="display: none"></div>
        </button>
        @include('partials.auth.footer')
    </form>
@endsection
