@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Penyerahan Takah
        </h4>
    </div>

    {{--forms--}}
    <div class="shadow mb-3">

        {{--accordion 1--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingOne">
                <div class="d-flex justify-content-between">
                    <p class="mb-0 text-white" id="collapseOne-text">
                        1. Form Keterangan Takah
                    </p>
                    <i id="tiket-masuk-check" class="fas fa-check text-info" style="display: none"></i>
                </div>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="accordionOne" data-parent="#accordion1">
                <div class="card-body">
                    {{--form start--}}
                    <form id="form-create-penyidik"
                          method="post"
                          action=""
                          enctype="multipart/form-data">
                        @csrf

                        {{--No Penerimaan BB--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                No. Penerimaan BB
                            </label>
                            <div class="col-lg-10">
                                <input type="text"
                                       class="form-control"
                                       minlength="5" maxlength="20"
                                       value="000004/01072020/PUS"
                                       readonly>
                                <small id="helper-no_hp" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--No Takah--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                No. Takah
                            </label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text"
                                           class="form-control penyidik"
                                           value="000004/NNF/2020/PUS"
                                           readonly>
                                </div>
                            </div>
                        </div>

                        {{--Nama Penyidik--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                Nama Penyidik Pendaftar
                            </label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text"
                                           class="form-control"
                                           value="John Doe"
                                           readonly>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        {{--accordion 2--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingTwo">
                <div class="d-flex justify-content-between">
                    <p class="mb-0 text-white" id="collapseTwo-text">
                        2. Form Penyidik Penerima Takah
                    </p>
                    <i id="tiket-masuk-check" class="fas fa-check text-info" style="display: none"></i>
                </div>
            </div>

            <div>
                <div class="card-body">
                    {{--form start--}}
                    <form id="form-create-penyidik"
                          method="post"
                          action=""
                          enctype="multipart/form-data">
                        @csrf

                        {{--Jenis Identitas--}}
                        <div class="form-group row">
                            <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                                Jenis Identitas
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="jenis-identitas"
                                        name="jenis-identitas"
                                        style="width: 100%"
                                >
                                    <option value="" disabled selected>Pilih Jenis Identitas</option>
                                    <option value="KTP">KTP</option>
                                    <option value="NRP">NRP</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--No Identitas--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                No. Identitas
                            </label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <div class="input-group-append" style="cursor: pointer">
                                        <span class="input-group-text btn-lims-gradient" id="basic-addon2">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--Nama Penyidik--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                Nama Penyidik Penerima
                            </label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        {{--No HP/Telp--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                No. HP/Telp
                            </label>
                            <div class="col-lg-10">
                                <input type="text"
                                       name="no_hp"
                                       id="no_hp"
                                       class="form-control"
                                       minlength="5" maxlength="20">
                                <small id="helper-no_hp" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Keterangan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                Keterangan Penerima
                            </label>
                            <div class="col-lg-10">
                                <textarea name="" class="form-control" rows="3"></textarea>
                                <small id="helper-no_hp" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--foto--}}
                        <div class="form-group row mb-0">
                            <label class="col-lg-2 col-form-label text-lg-right">Foto Penerima</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-lims-gradient btn-file">
                                            Pilih Foto
                                            <input type="file"
                                                   name="foto_pj"
                                                   id="imgInp"
                                                   accept=".png, .jpg, .jpeg">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <small id="helper-foto_pj" class="form-text text-danger">
                                    <span class="text-muted">nb: ukuran foto max.512KB dan berorientasi portrait</span>
                                </small>
                                <img id='img-upload'/>
                            </div>
                        </div>

                        {{--Tanda Tangan--}}
                        {{--input ttd--}}
                        <div class="row">
                            <label for="selectJabatan" class="col-lg-2 col-form-label text-lg-right">
                                Tanda Tangan
                            </label>
                            <div class="col-lg-10 text-center d-flex flex-column flex-lg-row">
                                <div class="d-flex flex-column signature-container">
                                    <div id="signature" style="border: 1px solid #cbcccd;"></div>
                                    <small id="helper-digitalsign" class="form-text text-danger"></small>
                                </div>
                                <div style="width: 10px">

                                </div>
                                <div class="d-flex flex-column">
                                    <button id='click' type="button" class="btn btn-sm btn-lims-gradient mt-1 mb-1">
                                        Simpan Tanda Tangan
                                    </button>
                                    <button id="reset" type="button" class="btn btn-sm btn-light mt-1 mb-1">
                                        Bersihkan Tanda Tangan
                                    </button>
                                </div>
                            </div>

                        </div>
                        {{--preview ttd--}}
                        <div class="form-group row">
                            <label id="prev" class="col-lg-2 col-form-label text-lg-right"></label>
                            <div class="col-lg-10">
                                <img class="bg-light" src='' id='sign_prev' style='display: none;'/>
                            </div>
                        </div>
                        {{--ttd to save--}}
                        <textarea id='output' name="digitalsign" class="d-none"></textarea>

                        {{--Submit--}}
                        <div class="d-flex justify-content-end">
                            <button type="button"
                                    class="btn btn-lims-gradient d-flex align-content-center"
                                    data-toggle="modal"
                                    data-target="#modalPenyerahan">
                                Simpan Form
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    {{--accordions form end--}}
@endsection

@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="modalPenyerahan" tabindex="-1" role="dialog" aria-labelledby="modalPenyerahan"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <span class="d-block mb-3 text-center">
                        <i class="fas fa-check-circle fa-5x text-lims-gradient"></i>
                    </span>
                    <h5 class="text-muted text-center mb-1">
                        Proses Takah Selesai.
                    </h5>
                    <p class="text-muted mb-3 text-center">
                        Serahkan dokumen penyerahan ke penyidik penerima?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <a href="{{ route("dummies.takah.cetakan.penyerahan", ["status" => 6]) }}"
                       role="button"
                       class="btn btn-lims-gradient">
                        Ya, serahkan
                    </a>
                </div>
            </div>
        </div>
    </div>
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

        @media only screen and (min-width: 992px) {
            .signature-container {
                width: 35%;
            }
        }
    </style>
@endsection

@section('localscript')
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

            //cek asal permintaan
            $('#asal-permintaan').on('change', function () {
                const val = $(this).val();
                if (val === "nonpolri") {
                    $('#polda').attr({"disabled": true});
                    $('#polres').attr({"disabled": true});
                    $('#polsek').attr({"disabled": true});
                } else {
                    $('#polda').attr({"disabled": false});
                    $('#polres').attr({"disabled": false});
                    $('#polsek').attr({"disabled": false});
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

            // takah
            $('#simpan-takah').on('click', function (event) {
                event.preventDefault();
                $('#tambah-takah').removeClass('d-none');
                $('#btn4').removeClass('d-none');
                $('#takah-data').removeClass('d-none');
                $(this).removeClass('d-flex');
                $(this).addClass('d-none');
            });

            $('.select2-container--default .select2-selection--single .select2-selection__rendered')
                .css({'color': '#222222', 'font-weight': 'normal'})

        });
    </script>
@endsection

