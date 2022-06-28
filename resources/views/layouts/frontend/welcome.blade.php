<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('meta.default')
    <link href="{{ mix("css/frontend.css") }}" rel="stylesheet"/>
    <title>LIMS PUSSANSIAD</title>
</head>
<body id="welcome-page">

{{--navbar--}}
@include('partials.welcome.navbar')

{{--main--}}
@yield('section')

{{--footer--}}
@include('partials.welcome.footer')

<script>
    const copyright = document.querySelector("#copyright")
    const tanggal = new Date();
    copyright.textContent = `Copyright © LIMS PUSSANSIAD ${tanggal.getFullYear()}`
</script>

</body>
</html>
