@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Detail Takah
        </h4>
        <a class="btn btn-danger" href="{{ route('dashboard') }}" role="button">
            Kembali
        </a>
    </div>

    {{--forms--}}
    <div class="shadow mb-3">
        @include('takah.detail.partials.form1')
        @include('takah.detail.partials.form2')
        @include('takah.detail.partials.form3')
        @if($takah->statustakah_id > 2 )
            @include('takah.detail.partials.form4')
        @endif
        @if($takah->statustakah_id > 3 )
            @include('takah.detail.partials.form5')
            @include('takah.detail.partials.form6')
        @endif
        @if($takah->statustakah_id > 4 )
            @include('takah.detail.partials.form7')
        @endif
    </div>
    {{--accordions form end--}}
@endsection

@section('localcss')
    <style>
        body {
            color: #222222;
        }

        .card-body {
            background: whitesmoke;
        }

        .form-control {
            color: #222222;
        }

        .select2-container--default .select2-selection--single:focus {
            outline: none;
        }

        .select2-search--dropdown .select2-search__field {
            border-radius: 5px;
        }

        .select2-search--dropdown .select2-search__field:focus {
            outline: none;
            border-radius: 5px;
        }

        strong.select2-results__group {
            text-transform: capitalize;
        }

        .btn-file {
            position: relative;
            overflow: hidden;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        .signature-container {
            width: 100%;
        }

        input[type='text']::placeholder {
            color: lightgrey;
        }

        input[type='text']:focus::placeholder {
            color: transparent;
        }

        #cari_identitas {
            cursor: pointer
        }

        #cari_identitas:active {
            background: orangered;
        }

        #clear_identitas {
            cursor: pointer
        }

        #clear_identitas:active {
            background: orangered;
        }

        @media only screen and (min-width: 992px) {
            .signature-container {
                width: 35%;
            }
        }

        /* foto stream */
        #video {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            width: 320px;
            height: 240px;
        }

        #photo {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            width: 320px;
            height: 240px;
        }

        #canvas {
            display: none;
        }

        .camera {
            width: 340px;
            display: inline-block;
        }

        .output {
            width: 340px;
            display: inline-block;
        }

        #startbutton {
            display: block;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            bottom: 3.5rem;
        }

        .contentarea {
            font-size: 16px;
            font-family: "Lucida Grande", "Arial", sans-serif;
            width: 760px;
        }

    </style>
@endsection

