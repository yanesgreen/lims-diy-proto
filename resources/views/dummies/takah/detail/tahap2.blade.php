@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Tahap I
        </h4>
        <a class="btn btn-danger" href="{{ route('dashboard') }}" role="button">
            Kembali
        </a>
    </div>

    {{--forms--}}
    <div class="shadow mb-3">

        {{--accordion 1--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingOne">
                <div class="d-flex justify-content-between">
                    <p class="mb-0 text-white" id="collapseOne-text">
                        1. Form Identitas Penyidik
                    </p>
                    <i id="tiket-masuk-check" class="fas fa-check text-info" style="display: none"></i>
                </div>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="accordionOne" data-parent="#accordion1">
                <div class="card-body">
                    {{--Jenis Identitas--}}
                    <div class="form-group row">
                        <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                            Jenis Identitas
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="KTP" readonly>
                        </div>
                    </div>

                    {{--No Identitas--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            No. Identitas
                        </label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input class="form-control" type="text" value="899008877899" readonly>
                            </div>
                        </div>
                    </div>

                    {{--No HP/Telp--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            No. HP/Telp
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="089877576" readonly>
                        </div>
                    </div>

                    {{--foto bb--}}
                    <div class="form-group row mb-0">
                        <label class="col-lg-2 col-form-label text-lg-right">Foto Penyidik</label>
                        <div class="col-lg-10">
                            <img style="height: 100px; object-fit: cover; object-position: top"
                                 src="{{ asset('storage/avatars/yanesgreen_1575432371.jpg') }}" alt="foto penyidik">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{--accordion 2--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingTwo">
                <div class="d-flex justify-content-between">
                    <p class="mb-0 text-white" id="collapseTwo-text">
                        2. Form BB Masuk
                    </p>
                    <i id="tiket-masuk-check" class="fas fa-check text-info" style="display: none"></i>
                </div>
            </div>

            <div>
                <div class="card-body">
                    {{--form start--}}

                    {{--No Penerimaan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            No. Penerimaan
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" value="000004/NNF/2020/PUS" readonly>
                        </div>
                    </div>

                    {{--No Surat Permintaan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            No. Surat Permintaan
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="123456789" readonly>
                        </div>
                    </div>

                    {{--Tgl Permintaan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Tgl. Surat Permintaan
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="1 Juli 2020" readonly>
                        </div>
                    </div>

                    {{--Asal Permintaan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Asal Permintaan
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="POLRI" readonly>
                        </div>
                    </div>

                    {{--No Surat Permintaan Pemeriksaan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right font-weight-bold">
                            Satuan Wilayah Peminta
                        </label>
                        <div class="col-lg-10"></div>
                    </div>

                    {{--Mabes/Non Mabes--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Mabes/Non Mabes
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="Non Mabes" readonly>
                        </div>
                    </div>

                    {{--Polda--}}
                    <div class="form-group row">
                        <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                            Polda
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="Polda Metro Jaya" readonly>
                        </div>
                    </div>

                    {{--Polres--}}
                    <div class="form-group row">
                        <label for="polres" class="col-lg-2 col-form-label text-lg-right">
                            Polres
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="Polres Metro Jakarta" readonly>
                        </div>
                    </div>

                    {{--Polsek--}}
                    <div class="form-group row">
                        <label for="polsek" class="col-lg-2 col-form-label text-lg-right">
                            Polsek
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="Polsek Metro Menteng" readonly>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{--accordion 3--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingThree">
                <p class="mb-0 text-white" id="collapseThree-text">
                    3. Barang Bukti
                </p>
            </div>
            <div>
                <div class="card-body">

                    {{--Jenis Barang Bukti--}}
                    <div class="form-group row">
                        <label for="selectJabatan" class="col-lg-2 col-form-label text-lg-right">
                            Jenis Barang Bukti
                        </label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="Narkoba berupa bahan dasar dan urine"
                                   readonly>
                        </div>
                    </div>

                    {{--Keterangan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Keterangan
                        </label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value=""
                                   readonly>
                        </div>
                    </div>

                    {{--Jumlah Barang Bukti--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Jumlah</label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="1"
                                   readonly>
                        </div>
                    </div>

                    {{--Berat--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Berat</label>
                        <div class="col-lg-10 input-group">
                            <input type="text"
                                   class="form-control"
                                   value="100"
                                   readonly>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">gram</span>
                            </div>
                        </div>
                    </div>

                    {{--foto bb--}}
                    <div class="form-group row mb-0">
                        <label class="col-lg-2 col-form-label text-lg-right">Foto Barang Bukti</label>
                        <div class="col-lg-10">
                            <img style="height: 100px; object-fit: cover; object-position: top"
                                 src="{{ asset('images/narkobafor.jpg') }}" alt="foto bb">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{--accordion 4--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingFour">
                <p class="mb-0 text-white" id="collapseFour-text">
                    4. Takah
                </p>
            </div>
            <div>
                <div class="card-body">

                    {{--Pilih Bidang--}}
                    <div class="form-group row">
                        <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                            Bidang
                        </label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="Narkobafor"
                                   readonly>
                        </div>
                    </div>

                    {{--Pilih SubBidang--}}
                    <div class="form-group row">
                        <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                            Sub Bidang
                        </label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="Sub Bidang Narkotika"
                                   readonly>
                        </div>
                    </div>

                    {{--Nomor Takah--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Nomor Takah</label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="000004/NNF/2020/PUS"
                                   readonly>
                        </div>
                    </div>

                    {{--Dibuka Oleh--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">BB Dibuka Oleh</label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="John Doe"
                                   readonly>
                        </div>
                    </div>

                    {{--Kasus--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Kasus</label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="narkoba"
                                   readonly>
                        </div>
                    </div>

                    {{--Tersangka/Saksi 1--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Tersangka/Saksi 1</label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="Jimmy Lima"
                                   readonly>
                        </div>
                    </div>

                    {{--Tersangka 2--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Tersangka/Saksi 2</label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="Andi Dekil"
                                   readonly>
                        </div>
                    </div>

                    {{--Dokumen Kelengkapan Mindik--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Kelengkapan Mindik</label>
                        <div class="col-lg-10 pt-2">
                            {{--Laporan Polisi--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" nama="laporan_polisi" checked>
                                <label class="form-check-label" for="exampleCheck1">Laporan Polisi</label>
                            </div>
                            {{--Surat Permohonan--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="surat_permohonan" checked>
                                <label class="form-check-label" for="exampleCheck1">Surat Permohonan</label>
                            </div>
                            {{--Sprin Geledah--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="sprin_geledah" checked>
                                <label class="form-check-label" for="exampleCheck1">Sprin Geledah</label>
                            </div>
                            {{--BAP Geledah--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="bap_geledah" checked>
                                <label class="form-check-label" for="exampleCheck1">BAP Geledah</label>
                            </div>
                            {{--Sprin Sita--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="sprin_sita" checked>
                                <label class="form-check-label" for="exampleCheck1">Sprin Sita</label>
                            </div>
                            {{--BAP Sita--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="bap_sita" checked>
                                <label class="form-check-label" for="exampleCheck1">BAP Sita</label>
                            </div>
                            {{--Lapju--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="lapju" checked>
                                <label class="form-check-label" for="exampleCheck1">Laporan Kemajuan</label>
                            </div>
                            {{--BAP Keterangan Saksi--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="bap_keterangan_saksi" checked>
                                <label class="form-check-label" for="exampleCheck1">BAP Keterangan Saksi</label>
                            </div>
                            {{--BAP Saksi/Tersangka--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="bap_saksi_tersangka" checked>
                                <label class="form-check-label" for="exampleCheck1">BAP Saksi/Tersangka</label>
                            </div>
                        </div>
                    </div>

                    {{--Mindik Tambahan 1--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan</label>
                        <div class="col-lg-10">
                            <input type="text"
                                   id="mindik_tambahan_1"
                                   name="mindik_tambahan_1"
                                   class="form-control"
                                   value="Mindik Tambahan 1"
                                   readonly
                            >
                        </div>
                    </div>

                    {{--Mindik Tambahan 2--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right"></label>
                        <div class="col-lg-10">
                            <input type="text"
                                   id="mindik_tambahan_2"
                                   name="mindik_tambahan"
                                   class="form-control"
                                   value="Mindik Tambahan 2"
                                   readonly
                            >
                        </div>
                    </div>

                    {{--Mindik Tambahan 3--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right"></label>
                        <div class="col-lg-10">
                            <input type="text"
                                   id="mindik_tambahan_3"
                                   name="mindik_tambahan_3"
                                   class="form-control"
                                   value="Mindik Tambahan 3"
                                   readonly
                            >
                        </div>
                    </div>

                </div>
            </div>
        </div>
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



