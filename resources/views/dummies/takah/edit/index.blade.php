@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Edit Dokumen Takah
        </h4>
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
                                <select class="form-control select2 penyidik"
                                        id="jenis-identitas"
                                        name="jenis-identitas"
                                        style="width: 100%">
                                    <option value="KTP" selected>KTP</option>
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
                                    <input type="text"
                                           class="form-control penyidik"
                                           value="123456789">
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
                                       class="form-control penyidik"
                                       minlength="5" maxlength="20"
                                       value="880809978">
                                <small id="helper-no_hp" class="form-text text-danger"></small>
                            </div>
                        </div>

                    </form>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-secondary text-white d-flex align-content-center ml-2">
                            Ubah Data Penyidik
                            <i id="loader-bb"
                               class="fas fa-circle-notch fa-spin ml-2 mt-1"
                               style="display: none">
                            </i>
                        </button>
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
                    <form id="form-create-bb-masuk"
                          method="post"
                          action=""
                          enctype="multipart/form-data">
                        @csrf

                        {{--No Penerimaan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                No. Penerimaan
                            </label>
                            <div class="col-lg-10">
                                <input type="number"
                                       name="no_penerimaan"
                                       class="form-control"
                                       value="089000"
                                       readonly>
                            </div>
                        </div>

                        {{--No Surat Permintaan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                No. Surat Permintaan
                            </label>
                            <div class="col-lg-10">
                                <input type="number"
                                       name="no_surat_permintaan"
                                       class="form-control"
                                       value="123456789">
                            </div>
                        </div>

                        {{--Tgl Permintaan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                Tgl. Surat Permintaan
                            </label>
                            <div class="col-lg-10">
                                <input type="date"
                                       name="tgl_surat_permintaan"
                                       class="form-control"
                                       value="2020-07-01">
                            </div>
                        </div>

                        {{--Asal Permintaan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                Asal Permintaan
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="asal-permintaan"
                                        name="asal_permintaan"
                                        style="width: 100%"
                                >
                                    <option value="polri" selected>Polri</option>
                                    <option value="nonpolri">Non Polri</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--No Surat Permintaan Pemeriksaan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right font-weight-bold">
                                Satuan Wilayah Peminta
                            </label>
                            <div class="col-lg-10"></div>
                        </div>

                        {{--Polda--}}
                        <div class="form-group row">
                            <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                                Polda
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="polda"
                                        name="polda"
                                        style="width: 100%"
                                >
                                    <option value="KTP" selected>Polda A</option>
                                    <option value="NRP">Polda B</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Polres--}}
                        <div class="form-group row">
                            <label for="polres" class="col-lg-2 col-form-label text-lg-right">
                                Polda
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="polres"
                                        name="polres"
                                        style="width: 100%"
                                >
                                    <option value="KTP" selected>Polres 1</option>
                                    <option value="NRP">Polres 2</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Polsek--}}
                        <div class="form-group row">
                            <label for="polsek" class="col-lg-2 col-form-label text-lg-right">
                                Polsek
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="polsek"
                                        name="polsek"
                                        style="width: 100%"
                                >
                                    <option value="KTP" selected>Polsek 1</option>
                                    <option value="NRP">Polsek 2</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                    </form>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-secondary text-white d-flex align-content-center ml-2">
                            Ubah Data BB Masuk
                            <i id="loader-bb"
                               class="fas fa-circle-notch fa-spin ml-2 mt-1"
                               style="display: none">
                            </i>
                        </button>
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
                    {{--bb-table--}}
                    <div class="overflow-hidden">
                        <table class="table table table-bordered">
                            <thead class="bg-success text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="bg-light">
                            <tr id="bb-data">
                                <td width="10%">1</td>
                                <td>Iphone X</td>
                                <td width="30%">pic 1</td>
                                <td width="10%" class="text-center">
                                    <span class="badge badge-pill badge-danger">del</span>
                                    <span class="badge badge-pill badge-success">edit</span>
                                </td>
                            </tr>
                            <tr id="bb-data">
                                <td width="10%">1</td>
                                <td>Iphone X</td>
                                <td width="30%">pic 1</td>
                                <td width="10%" class="text-center">
                                    <span class="badge badge-pill badge-danger">del</span>
                                    <span class="badge badge-pill badge-success">edit</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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
                    {{--form start--}}
                    <form id="form-create-takah"
                          class=" mb-0"
                          method="post"
                          action="{{ route('barang_bukti.store') }}"
                          enctype="multipart/form-data">
                        @csrf

                        {{--Pilih BB--}}
                        <div class="form-group row">
                            <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                                Pilih Barang Bukti
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        multiple="multiple"
                                        id="bb-takah"
                                        name="bb-takah"
                                        style="width: 100%"
                                >
                                    <option value="bb1" selected>Barang Bukti 1</option>
                                    <option value="bb2" selected>Barang Bukti 2</option>
                                    <option value="bb3">Barang Bukti 3</option>
                                    <option value="bb4">Barang Bukti 4</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Pilih Bidang--}}
                        <div class="form-group row">
                            <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                                Bidang
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="bidang"
                                        name="bidang"
                                        style="width: 100%"
                                >
                                    <option value="bidang1" selected>Bidang 1</option>
                                    <option value="bidang2">Bidang 2</option>
                                    <option value="bidang3">Bidang 3</option>
                                    <option value="bidang4">Bidang 4</option>
                                </select>
                                <small id="helper-bidang" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Pilih SubBidang--}}
                        <div class="form-group row">
                            <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                                Sub Bidang
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="subbidang"
                                        name="subbidang"
                                        style="width: 100%"
                                >
                                    <option value="subbidang1" selected>Sub Bidang 1</option>
                                    <option value="subbidang2">Sub Bidang 2</option>
                                    <option value="subbidang3">Sub Bidang 3</option>
                                    <option value="subbidang4">Sub Bidang 4</option>
                                </select>
                                <small id="helper-subbidang" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Nomor Takah--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Nomor Takah</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="no_takah"
                                       name="no_takah"
                                       class="form-control"
                                       value="090009"
                                       readonly>
                                <small id="helper-no_takah" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Dibuka Oleh--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">BB Dibuka Oleh</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="dibuka_oleh"
                                       name="dibuka_oleh"
                                       class="form-control"
                                       minlength="3"
                                       value="Urtu 1">
                                <small id="helper-keterangan" class="form-text text-danger">
                                    <span class="text-muted"></span>
                                </small>
                            </div>
                        </div>

                        {{--Kasus--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Kasus</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="kasus"
                                       name="kasus"
                                       class="form-control"
                                       minlength="3"
                                       value="kasus 1">
                                <small id="helper-keterangan" class="form-text text-danger">
                                    <span class="text-muted"></span>
                                </small>
                            </div>
                        </div>

                        {{--Anak Persoalan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Anak Persoalan</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="anak_persoalan"
                                       name="anak_persoalan"
                                       class="form-control"
                                       value="anak persoalan 1"
                                >
                                <small id="helper-anak_persoalan" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Cucu Persoalan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Cucu Persoalan</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="cucu_persoalan"
                                       name="cucu_persoalan"
                                       class="form-control"
                                       value="cucu persoalan 1"
                                >
                                <small id="helper-cucu_persoalan" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Tersangka 1--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Tersangka 1</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="tersangka1"
                                       name="tersangka1"
                                       class="form-control"
                                       value="tersangka 1"
                                >
                                <small id="helper-tersangka1" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Tersangka 2--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Tersangka 2</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="tersangka2"
                                       name="tersangka2"
                                       class="form-control"
                                       value="tersangka 2"
                                >
                                <small id="helper-tersangka2" class="form-text text-danger"></small>
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
                                {{--Sprin dan BAP Geledah--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="sprin_bap_geledah" checked>
                                    <label class="form-check-label" for="exampleCheck1">Sprin dan BAP Geledah</label>
                                </div>
                                {{--Sprin dan BAP Sita--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="sprin_bap_sita" checked>
                                    <label class="form-check-label" for="exampleCheck1">Sprin dan BAP Sita</label>
                                </div>
                                {{--BAP Tersangka/Saksi--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="bap_tersangka_saksi" checked>
                                    <label class="form-check-label" for="exampleCheck1">Sprin dan BAP Sita</label>
                                </div>
                                {{--Lapju--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="lapju" checked>
                                    <label class="form-check-label" for="exampleCheck1">Laporan Kemajuan</label>
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
                                >
                                <small id="helper-mindik_tambahan1" class="form-text text-danger"></small>
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
                                >
                                <small id="helper-mindik_tambahan1" class="form-text text-danger"></small>
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
                                >
                                <small id="helper-mindik_tambahan1" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Submit--}}
                        <div class="d-flex justify-content-end mb-3">
                            <button id="simpan-takah"
                                    class="btn btn-secondary text-white d-flex align-content-center ml-2">
                                Ubah Data Takah
                                <i id="loader-bb"
                                   class="fas fa-circle-notch fa-spin ml-2 mt-1"
                                   style="display: none">
                                </i>
                            </button>
                            <button id="tambah-takah"
                                    class="btn btn-secondary text-white d-none align-content-center ml-2">
                                Tambah Takah
                                <i id="loader-bb"
                                   class="fas fa-circle-notch fa-spin ml-2 mt-1"
                                   style="display: none">
                                </i>
                            </button>
                            <button id="btn4"
                                    class="btn btn-lims-gradient d-none align-content-center ml-2"
                                    data-toggle="modal" data-target="#modalsukses">
                                Selesai
                                <i id="loader-bb"
                                   class="fas fa-circle-notch fa-spin ml-2 mt-1"
                                   style="display: none">
                                </i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--accordions form end--}}

    {{--Buttons--}}
    <div class="card mb-5 shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center text-primary">
            <p class="mb-0">
                Kembali Ke Dashboard?
            </p>
            <div class="d-flex">
                <a href="{{ route('dashboard') }}"
                   class="btn btn-lims-gradient align-content-center ml-2">
                    Ya, kembali
                </a>
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

