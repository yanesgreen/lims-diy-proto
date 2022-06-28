<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta.default')
    <title>LIMS PUSSANSIAD - LOGIN</title>
    <link href="{{ mix('css/auth.css') }}" rel="stylesheet"/>
</head>
<body class="text-center">

{{--content--}}
@yield('content')

{{--scripts--}}
@stack('scripts')

</body>
</html>
