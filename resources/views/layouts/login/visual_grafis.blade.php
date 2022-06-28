<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta.default')
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet"/>
    <title>LIMS PUSSANSIAD</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            font-size: 14px;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background: #222222;
        }

        .font-xs {
            font-size: 0.75rem;
        }

        .fill-current {
            fill: currentColor;
        }

        .overlay {
            width: 100%;
            height: 100vh;
            background: #222222;
            position: fixed;
            z-index: 0;
        }

        .form-signin {
            width: 100%;
            max-width: 450px;
            padding: 15px;
            margin: auto;
            z-index: 1;
        }

        .mb-login {
            margin-bottom: 2rem;
        }

        @media only screen and (min-width: 48em) {
            body {
                background: #142330;
                background: -webkit-linear-gradient(to right, #0a0d14, #142330);
                background: linear-gradient(to right, #0a0d14, #142330);
            }

            body:before {
                content: "";
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                right: 0;
                left: 0;
                bottom: 0;
                z-index: 0;
                background-image: url("{{ asset('images/smile-bg-pattern-v3.png') }}");
                background-repeat: no-repeat;
                background-position: top left;
                background-size: cover;
                filter: blur(1px) opacity(0.1);
            }

            .overlay {
                display: none;
            }

            .form-signin {
                background: rgba(20, 35, 48, 0.6);
                border-radius: 0.5rem;
                padding: 25px;
            }
        }


        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control-inverse {
            color: #fff7d8;
            background-color: hsla(0, 0%, 100%, .05);
            border-color: rgba(255, 247, 216, 0.75);
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        #see-password {
            right: 1em;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 3;
            opacity: 0.75;
        }

        .loader {
            width: 24px;
            height: 24px;
            border: 3px solid #222222;
            border-top: 3px solid orangered;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg)
            }
            100% {
                transform: rotate(360deg)
            }
        }
    </style>
</head>
<body class="text-center">
<div class="overlay"></div>
@yield('content')
</body>
<script>
    //ganti visibility
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
</body>
</html>


