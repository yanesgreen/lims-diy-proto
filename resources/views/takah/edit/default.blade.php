@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Edit Takah
        </h4>
        <a class="btn btn-primary"
           href="{{ route('dashboard') }}"
           role="button">
            Ke Dashboard
        </a>
    </div>

    {{--Accordion--}}
    <div>
        {{--Accordion 1--}}
        <div class="card">
            <div class="card-header bg-primary">
                <p class="mb-0 text-info">
                    1. Identitas Penyidik/Pengirim
                </p>
            </div>

            <div>
                <div class="card-body">
                    @include('takah.edit.partials.forms.1')
                </div>
            </div>
        </div>
        {{--Accordion 2--}}
        <div class="card">
            <div class="card-header bg-primary">
                <p class="mb-0 text-info">
                    2. Kasus dan Barang Bukti
                </p>
            </div>
            <div>
                <div class="card-body">
                    @include('takah.edit.partials.forms.2')
                </div>
            </div>
        </div>
        {{--Accordion 3--}}
        <div class="card">
            <div class="card-header bg-primary">
                <p class="mb-0 text-info">
                    3. Takah
                </p>
            </div>
        </div>
    </div>
    {{--Accordion 4--}}
    @if($takah->statustakah_id > 2 )
        <div class="card">
            <div class="card-header bg-primary">
                <p class="mb-0 text-info">
                    4. Catatan/Keterangan
                </p>
            </div>
            <div>
                <div class="card-body">
                    @include('takah.edit.partials.forms.4')
                </div>
            </div>
        </div>
    @endif
    {{--Accordion 5--}}
    @if($takah->statustakah_id > 3 )
        <div class="card">
            <div class="card-header bg-primary">
                <p class="mb-0 text-info">
                    5. Pemeriksa
                </p>
            </div>
            <div>
                <div class="card-body">
                    @include('takah.edit.partials.forms.5')
                </div>
            </div>
        </div>
    @endif

@endsection

@section('modals')
    @include('takah.edit.partials.modals.default')
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
    </style>
@endsection

@section('localscript')
    <script src="{{ asset('js/jquery.chained.min.js') }}"></script>
    <script src="{{ asset('js/jquery.chained.remote.js') }}"></script>
    <script defer>
        $(document).ready(function () {
            // submit onclick
            $('#btn-simpan-tiket').on('click', function () {
                if ($('#output').val() === '') {
                    $('#digitalSignHelper').text('bagian ini harus diisi');
                }
            });

            // select2
            $('.select2').select2();

            // select2 color
            $('.select2-container--default .select2-selection--single .select2-selection__rendered')
                .css({'color': '#222222', 'font-weight': 'normal'});

            // j signature
            var $sigdiv = $("#signature").jSignature();

            $('#reset').on('click', function () {
                $("#signature").jSignature('reset');
            });

            $('#click').click(function () {
                // Get response of type image
                var data = $sigdiv.jSignature('getData');

                // Storing in textarea
                $('#output').val(data);

                // Alter image source
                let preview = $('#sign_prev');
                $('#prev').text('Preview Tanda Tangan');
                preview.attr('src', "data:" + data).css({
                    "box-shadow": "0 .5rem 1rem rgba(0,0,0,.15)",
                    "margin-top": 8,
                    "margin-bottom": 8
                });
                preview.show();
            });

            // input:image tiket masuk
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result).css({
                    "height": 100,
                    "width": "auto",
                    "margin-top": 4,
                    "margin-bottom": 16
                });
            };

            function readURL(input) {
                if (input.files && input.files[0]) {
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function () {
                readURL(this);
            });

            // input:image bb
            var reader2 = new FileReader();
            reader2.onload = function (e) {
                $('#img-upload-2').attr('src', e.target.result).css({
                    "height": 100,
                    "width": "auto",
                    "margin-top": 4,
                    "margin-bottom": 16
                });
            };

            function readURL2(input) {
                if (input.files && input.files[0]) {
                    reader2.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp2").change(function () {
                readURL2(this);
            });

            const noId = $('#no_identitas');
            noId.change(function () {
                if ($('#no_identitas').val().length > 20) {
                    $('#no_identitas').val('');
                    $('#helper-no_identitas').text('No identitas tidak boleh lebih dari 20 digit');
                } else if ($('#no_identitas').val().length <= 20) {
                    $('#helper-no_identitas').text('');
                }
            });

            // tgl penerimaan
            $('#tgl_penerimaan').on('change', function () {
                tglPenerimaan = $('#tgl_penerimaan').val();
                $('#created_at').val(tglPenerimaan);
            });

            // block pangkat
            $('#jenis_identitas').on('change', function () {
                $('#pangkat').val(null).trigger('change');
                const val = $(this).val();
                console.log(val);
                if (val !== '3') {
                    $('#pangkat').attr({"disabled": true});
                } else {
                    $('#pangkat').attr({"disabled": false});
                }
            });

            //cek asal permintaan
            $('#asal-permintaan').on('change', function () {
                const val = $(this).val();
                if (val === "nonpolri") {
                    $('#polda').attr({"disabled": true}).val('').trigger('change');
                    $('#polres').attr({"disabled": true});
                    $('#polsek').attr({"disabled": true});
                    $('#mabes_nonmabes').attr({"disabled": true}).val('').trigger('change');
                    $('#direktorat').attr({"disabled": true}).val('');
                    $('#lembaga').attr({"disabled": false}).val('');
                } else {
                    $('#polda').attr({"disabled": false});
                    $('#polres').attr({"disabled": false});
                    $('#polsek').attr({"disabled": false});
                    $('#mabes_nonmabes').attr({"disabled": false});
                    $('#mabes_nonmabes').attr({"disabled": false});
                    $('#direktorat').attr({"disabled": false});
                    $('#lembaga').attr({"disabled": true});
                    $('#mabes').attr({"disabled": true});
                    $('#lembaga').attr({"disabled": true}).val('').trigger('change');
                }
            });

            $('#mabes_nonmabes').on('change', function () {
                const val = $(this).val();
                $('#direktorat').val(null).trigger('change');
                if (val === "non-mabes") {
                    $('#polda').attr({"disabled": true}).val('').trigger('change');
                    $('#direktorat').attr({"disabled": true});
                    $('#polda').attr({"disabled": false});
                    $('#polres').attr({"disabled": false});
                    $('#polsek').attr({"disabled": false});
                } else if (val === "mabes") {
                    $('#polda').attr({"disabled": true}).val('').trigger('change');
                    $('#direktorat').attr({"disabled": false});
                    $('#polda').attr({"disabled": true});
                    $('#polres').attr({"disabled": true});
                    $('#polsek').attr({"disabled": true});
                }
            });

            $('#kasus').on('change', function () {
                const val = $(this).val();
                if (val === "lain-lain") {
                    $('#keterangan-container').show();
                }
            });

            // bb
            $('#simpan-bb').on('click', function (event) {
                event.preventDefault();
                $('#tambah-bb').removeClass('d-none');
                $('#btn3').removeClass('d-none');
                $('#bb-data').removeClass('d-none');
                $(this).removeClass('d-flex');
                $(this).addClass('d-none');
            });

            //tersangka1
            $('#switch-tersangka1-b').on('click', function () {
                $('#tersangka1').attr({"disabled": true}).val('');
                $('#tersangka2').attr({"disabled": true}).val('');
                $('#tersangka3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-tersangka1-a').show();
                $('#switch-tersangka2-b').hide();
                $('#switch-tersangka3-b').hide();
            });

            $('#switch-tersangka1-a').on('click', function () {
                $('#tersangka1').attr({"disabled": false});
                $('#tersangka2').attr({"disabled": false});
                $('#tersangka3').attr({"disabled": false});
                $(this).hide();
                $('#switch-tersangka1-b').show();
                $('#switch-tersangka2-b').show();
                $('#switch-tersangka3-b').show();
            });

            // tersangka2
            $('#switch-tersangka2-b').on('click', function () {
                $('#tersangka2').attr({"disabled": true}).val('');
                $('#tersangka3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-tersangka2-a').show();
                $('#switch-tersangka3-b').hide();
            });

            $('#switch-tersangka2-a').on('click', function () {
                $('#tersangka2').attr({"disabled": false});
                $('#tersangka3').attr({"disabled": false});
                $(this).hide();
                $('#switch-tersangka2-b').show();
                $('#switch-tersangka3-b').show();
            });

            // tersangka3
            $('#switch-tersangka3-b').on('click', function () {
                $('#tersangka3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-tersangka3-a').show();
            });

            $('#switch-tersangka3-a').on('click', function () {
                $('#tersangka3').attr({"disabled": false});
                $(this).hide();
                $('#switch-tersangka3-b').show();
            });

            // saksi1
            $('#switch-saksi1-b').on('click', function () {
                $('#saksi1').attr({"disabled": true}).val('');
                $('#saksi2').attr({"disabled": true}).val('');
                $('#saksi3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-saksi1-a').show();
                $('#switch-saksi2-b').hide();
                $('#switch-saksi3-b').hide();
            });

            $('#switch-saksi1-a').on('click', function () {
                $('#saksi1').attr({"disabled": false});
                $('#saksi2').attr({"disabled": false});
                $('#saksi3').attr({"disabled": false});
                $(this).hide();
                $('#switch-saksi1-b').show();
                $('#switch-saksi2-b').show();
                $('#switch-saksi3-b').show();
            });

            //saksi2
            $('#switch-saksi2-b').on('click', function () {
                $('#saksi2').attr({"disabled": true}).val('');
                $('#saksi3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-saksi2-a').show();
                $('#switch-saksi3-b').hide();
            });

            $('#switch-saksi2-a').on('click', function () {
                $('#saksi2').attr({"disabled": false});
                $('#saksi3').attr({"disabled": false});
                $(this).hide();
                $('#switch-saksi2-b').show();
                $('#switch-saksi3-b').show();
            });

            // saksi3
            $('#switch-saksi3-b').on('click', function () {
                $('#saksi3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-saksi3-a').show();
            });

            $('#switch-saksi3-a').on('click', function () {
                $('#saksi3').attr({"disabled": false});
                $(this).hide();
                $('#switch-saksi3-b').show();
            });

            // subbidang kode
            $('#subbidang_kode').on('change', function () {
                $('#notakah-subbidang_kode').text($(this).val())
            });

            // hilangkan detail foto bb kalo foto bb punya value
            $('#imgInp2').on('change', function () {
                $('#foto_bb_detail_container').hide();
                console.log('changed');
            });

            //remote chained
            $("#polres").remoteChained({
                parents: "#polda",
                url: "../../masterdata/polres/api/select/edit"
            });

            $("#polsek").remoteChained({
                parents: "#polres",
                url: "../../masterdata/polsek/api/select/edit"
            });

            // chained select
            $("#subbidang_kode").remoteChained({
                parents: "#bidang_id",
                url: "../../masterdata/subbidang/api/select/takah"
            });

            //---------------
            // cari identitas
            //--------------
            $('#cari_identitas').on('click', function () {
                const no_identitas = $('#no_identitas').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('penyidik.search') }}",
                    method: "POST",
                    data: {"no_identitas": no_identitas},
                    beforeSend: function () {
                        $('#icon-cari-identitas').hide();
                        $('#loader-cari-identitas').css('display', 'inherit');
                    },
                    error: function (xhr) {
                        const response = xhr.responseJSON;
                        alert("Error:" + response)
                    },
                    success: function (response) {
                        if (response.penyidik) {
                            alert(response.message);
                            $('#cari_identitas').hide();
                            $('#clear_identitas').show();
                            $('#penyidik_id').val(response.penyidik.id).attr({"readonly": "readonly"});
                            $('#nama').val(response.penyidik.nama).attr({"readonly": "readonly"});
                            $('#telepon').val(response.penyidik.telepon).attr({"readonly": "readonly"});
                            $('#jenis_identitas').select2({disabled: true}).val(response.penyidik.jenisidentitas_id).trigger('change');
                            $('#pangkat').select2({disabled: true}).val(response.penyidik.pangkat_id).trigger('change');
                            $('#foto-container').hide();
                            $('#foto-container-alt').show();
                            $('#digitalsign-container').removeClass('d-flex').addClass('d-none');
                            $('#digitalsign-container-alt').show();
                        } else {
                            alert(response.message);
                            $('#penyidik_id').val(null).attr({"readonly": false});
                            $('#nama').val(null).attr({"readonly": false});
                            $('#telepon').val(null).attr({"readonly": false});
                            $('#jenis_identitas').select2({disabled: false}).val(null).trigger('change');
                            $('#pangkat').select2({disabled: false}).val(null).trigger('change');
                            $('#foto-container').show();
                            $('#foto-container-alt').hide();
                            $('#digitalsign-container').removeClass('d-none').addClass('d-flex');
                            $('#digitalsign-container-alt').hide();
                        }
                    },
                    complete: function () {
                        $('#icon-cari-identitas').show();
                        $('#loader-cari-identitas').css('display', 'none');
                    }
                });

                return false;
            });

            //----------------
            // clear identitas
            //----------------
            $('#clear_identitas').on('click', function () {
                $(this).hide();
                $('#cari_identitas').show();
                $('#no_identitas').val(null);
                $('#penyidik_id').val(null).attr({"readonly": false});
                $('#nama').val(null).attr({"readonly": false});
                $('#telepon').val(null).attr({"readonly": false});
                $('#jenis_identitas').select2({disabled: false}).val(null).trigger('change');
                $('#pangkat').select2({disabled: false}).val(null).trigger('change');
                $('#foto-container').show();
                $('#foto-container-alt').hide();
                $('#digitalsign-container').removeClass('d-none').addClass('d-flex');
                $('#digitalsign-container-alt').hide();
            });

        });
    </script>
@endsection

