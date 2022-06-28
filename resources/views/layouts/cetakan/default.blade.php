<!DOCTYPE html>
<html lang="en">
<head>
    @include('meta.default')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ mix('css/paper.css') }}">
    <link rel="stylesheet" href="{{ mix('css/cetakan.css') }}">
</head>

<body class="A4">

{{--status--}}
<div id="btn-cetak" style="position: fixed; bottom: 2em; left: 10em; z-index: 1;">
    @yield('status')
</div>

{{--float buttons--}}
<div id="btn-cetak" style="position: fixed; bottom: 2em; right: 10em; z-index: 1;">
    @yield('buttons')
</div>


{{--Halaman 1--}}
<section class="sheet cetakan-padding">

    @yield('preview')

    {{--Wrapper--}}
    <article class="justify-paragraf">

        {{--kop surat--}}
        <table class="table table-bordered mb-5">
            <tr>
                <td class="padding-td-normal text-center">
                    <img class="mb-1" src="{{ asset('images/puslabfor-480.png') }}" alt="Puslabfor"
                         style="height: 75px">
                    <p class="text-bold mb-1">{{ \App\UnitKerja::find(unitKerjaId())->nama }}</p>
                    <p class="font-size-8">{{ \App\UnitKerja::find(unitKerjaId())->alamat }}</p>
                </td>
            </tr>
            <tr>
                <td class="padding-td-large text-center">
                    <p class="text-bold">
                        @yield('namaFormulir')
                    </p>
                </td>
            </tr>
        </table>

        {{--main--}}
        @yield('content')

    </article>

</section>
</body>
</html>
