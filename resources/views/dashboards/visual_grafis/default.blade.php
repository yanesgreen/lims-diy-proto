@extends('layouts.backend.visual_grafis')

@section('content')

    {{--Page Heading--}}
    @include('partials.backend.visual_grafis.page_heading')

    {{--Map Links--}}
    @include('partials.backend.visual_grafis.map_links')

    {{--Cards Row--}}
    <div class="row bg-white rounded shadow">
        <div class="col-12 mb-4 py-5 px-5 relative">
            @include('visual_grafis.maps.indonesia.default')
            @include('visual_grafis.maps.puslabfor.default')
            @include('visual_grafis.maps.jateng.default')
            @include('visual_grafis.maps.loader')
            <button id="btn-kembali-ke-peta-utama" type="button" class="btn btn-primary" style="display: none">
                Back
            </button>
        </div>
    </div>

@endsection

@section('localscript')
    <script>
        $(document).ready(function () {

            // btn kembali
            $('#btn-kembali-ke-peta-utama').on('click', function () {
                $('#loading-wrapper').css({'display': 'flex'});
                $('#peta_puslabfor').css({'opacity': 0});
                $('#peta_jateng').css({'opacity': 0});
                setTimeout(function () {
                    $('#loading-wrapper').css({'display': 'none'});
                    $('#btn-kembali-ke-peta-utama').css({'display': 'none'});
                    $('#peta_puslabfor').css({'display': 'none'});
                    $('#peta_jateng').css({'display': 'none'});
                    $('#peta_indonesia').css({'display': 'initial', 'opacity': 1});
                }, 1000);
            });

            // ======
            // area
            // ======
            $('#puslabfor').on('click', function () {
                $('#peta_indonesia').css({'opacity': 0});
                $('#loading-wrapper').css({'display': 'flex'});
                setTimeout(function () {
                    $('#loading-wrapper').css({'display': 'none'});
                    $('#peta_indonesia').css({'display': 'none'});
                    $('#peta_puslabfor').css({'display': 'initial', 'opacity': 1});
                    $('#btn-kembali-ke-peta-utama').css({'display': 'initial'});
                }, 1000);
            });

            $('#jateng').on('click', function () {
                $('#peta_indonesia').css({'opacity': 0});
                $('#loading-wrapper').css({'display': 'flex'});
                setTimeout(function () {
                    $('#loading-wrapper').css({'display': 'none'});
                    $('#peta_indonesia').css({'display': 'none'});
                    $('#peta_jateng').css({'display': 'initial', 'opacity': 1});
                    $('#btn-kembali-ke-peta-utama').css({'display': 'initial'});
                }, 1000);
            });

        });
    </script>
@endsection

@section('localcss')
    <style>
        .active-link {
            color: #fed136 !important;
            cursor: text;
        }

        #btn-kembali-ke-peta-utama {
            position: absolute;
            top: 1em;
            right: 1em;
        }

        #peta_indonesia, #peta_puslabfor {
            transition: all 0.5s ease-in-out;
        }

        .st0 {
            fill: #6690ff;
            stroke: #FFFFFF;
            stroke-width: 0.25;
            stroke-miterlimit: 10;
            cursor: pointer;
        }

        .st0:hover {
            fill: #274395;
        }

        .st1 {
            fill: #D3DCF8;
            stroke: #FFFFFF;
            stroke-width: 0.25;
            stroke-miterlimit: 10;
        }

        .st2 {
            fill: #4169E1;
        }

        .st3 {
            fill: #000b22;
        }

        .st4 {
            fill: #000b22;
            stroke: none;
            font-weight: bold;
        }

        .st0:hover .st4 {
            fill: #4974ff;
        }

        .st5 {
            fill: #cd0000;
            cursor: pointer;
        }

        .st0:hover .st5 {
            fill: red;
        }

        .st5:hover {
            fill: red;
            cursor: pointer;
        }

        .st6 {
            fill: orange;
            cursor: pointer;
        }

        .peta-link {
            min-width: 100px;
            margin-right: 0.25rem;
        }

        .peta-link:last-child {
            margin-right: 0;
        }

        #loading-wrapper {
            z-index: 9999;
            position: absolute;
            display: flex;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            background-color: transparent;
            box-shadow: 0 0 7px 0 lightgrey;
            border-radius: 50%;
        }

        #loading {
            margin: auto;
            width: 80%;
            height: 80%;
            border-radius: 50%;
            border: 5px solid lightgrey;
            border-top: 5px solid #0069D9;
            animation: spin 1s infinite;
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
@endsection
