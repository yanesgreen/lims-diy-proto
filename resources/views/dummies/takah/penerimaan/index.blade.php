@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Penerimaan Barang Bukti
        </h4>
    </div>

    {{--accordions forms--}}
    <div class="accordion shadow mb-3" id="accordion1">

        {{--1. Identitas Penyidik/Pengirim--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingOne">
                <div class="d-flex justify-content-between">
                    <p class="mb-0 text-white text-info" id="collapseOne-text">
                        1. Identitas Penyidik/Pengirim
                    </p>
                    <i id="tiket-masuk-check" class="fas fa-check text-info" style="display: none"></i>
                </div>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="accordionOne" data-parent="#accordion1">
                <div class="card-body">
                    {{--form start--}}
                    <form id="form-create-takah"
                          method="post"
                          action=""
                          enctype="multipart/form-data">
                        @csrf

                        {{--Tgl Penerimaan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                Tgl. Penerimaan
                            </label>
                            <div class="col-lg-10">
                                <input type="date"
                                       name="tgl_surat_permintaan"
                                       class="form-control"
                                       value="">
                            </div>
                        </div>

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
                                    <option value="ktp">KTP</option>
                                    <option value="sim">SIM</option>
                                    <option value="nrp">NRP</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--No Identitas dan Pangkat--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                No. Identitas
                            </label>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <div class="input-group-append" style="cursor: pointer">
                                        <span class="input-group-text btn-lims-gradient" id="basic-addon2">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <label class="col-lg-2 col-form-label text-lg-right">
                                Pangkat
                            </label>
                            <div class="col-lg-4">
                                <select class="form-control select2"
                                        id="pangkat"
                                        name="pangkat"
                                        style="width: 100%"
                                >
                                    <option value="" disabled selected>Pilih Pangkat</option>
                                    @if (!empty($pangkat))
                                        @foreach ($pangkat as $index => $item)
                                            <option value="{{ $index }}">{{ $item }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Pengirim/Penyidik--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                Nama Penyidik/Pengirim
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

                        {{--foto--}}
                        <div class="form-group row mb-0">
                            <label class="col-lg-2 col-form-label text-lg-right">Foto Penyidik/Pengirim</label>
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

                    </form>
                    {{--form start--}}
                    <form id="form-create-bb-masuk"
                          method="post"
                          action=""
                          enctype="multipart/form-data">
                        @csrf

                        {{--No Surat Permintaan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                No. Surat Permintaan
                            </label>
                            <div class="col-lg-10">
                                <input type="text"
                                       name="no_surat_permintaan"
                                       class="form-control">
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
                                       value="">
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
                                    <option value="" disabled selected>Pilih Asal Permintaan</option>
                                    <option value="polri">POLRI</option>
                                    <option value="nonpolri">Non POLRI</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Satuan Wilayah Peminta Label--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right font-weight-bold">
                                Satuan Wilayah Peminta
                            </label>
                            <div class="col-lg-10"></div>
                        </div>

                        {{--Mabes--}}
                        <div class="form-group row">
                            <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                                Mabes POLRI/Satwil
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2 asal-wilayah"
                                        id="mabes_nonmabes"
                                        name="mabes_nonmabes"
                                        style="width: 100%"
                                >
                                    <option value="" disabled selected>Pilih Mabes POLRI/Satwil</option>
                                    <option value="mabes">Mabes</option>
                                    <option value="non-mabes">Satwil</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Direktorat--}}
                        <div class="form-group row">
                            <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                                Satker
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2 asal-wilayah"
                                        id="direktorat"
                                        name="direktorat"
                                        style="width: 100%">
                                    <option class="" value="" disabled selected>Pilih Direktorat</option>
                                    <option class="direktorat-option" value="">Direktorat Tipidter Bareskrim</option>
                                    <option class="direktorat-option" value="">Direktorat Tipidum Bareskrim</option>
                                    <option class="direktorat-option" value="">Direktorat Tipideksus Bareskrim</option>
                                    <option class="direktorat-option" value="">Direktorat Tipidkor Bareskrim</option>
                                    <option class="direktorat-option" value="">Direktorat Tipidnarkoba Bareskrim
                                    </option>
                                    <option class="direktorat-option" value="">Direktorat Tipidsiber Bareskrim</option>
                                    <option class="direktorat-option" value="">Dipropam Polri</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Polda--}}
                        <div class="form-group row">
                            <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                                Polda
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2 asal-wilayah"
                                        id="polda"
                                        name="polda"
                                        style="width: 100%"
                                >
                                    <option value="" disabled selected>Pilih Polda</option>
                                    @if (!empty($polda))
                                        @foreach ($polda as $index => $item)
                                            <option value="{{ $index }}">{{ $item }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Polres--}}
                        <div class="form-group row">
                            <label for="polres" class="col-lg-2 col-form-label text-lg-right">
                                Polres
                            </label>
                            <div class="col-lg-9">
                                <select class="form-control select2 asal-wilayah"
                                        id="polres"
                                        name="polres"
                                        style="width: 100%"
                                >
                                    <option value="" disabled selected>Pilih Polres</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                            <div class="col-lg-1">
                                <button id="btn-back-1-a" type="button" class="btn btn-primary w-100">...</button>
                                <button id="btn-back-1-b"
                                        type="button"
                                        class="btn btn-lims-gradient w-100"
                                        style="display: none">
                                    Back
                                </button>
                            </div>
                        </div>

                        {{--Polsek--}}
                        <div class="form-group row">
                            <label for="polsek" class="col-lg-2 col-form-label text-lg-right">
                                Polsek
                            </label>
                            <div class="col-lg-9">
                                <select class="form-control select2 asal-wilayah"
                                        id="polsek"
                                        name="polsek"
                                        style="width: 100%"
                                >
                                    <option value="" disabled selected>Pilih Polsek</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                            <div class="col-lg-1">
                                <button id="btn-back-2-a" type="button" class="btn btn-primary w-100">...</button>
                                <button id="btn-back-2-b"
                                        type="button"
                                        class="btn btn-lims-gradient w-100"
                                        style="display: none">
                                    Back
                                </button>
                            </div>
                        </div>

                        {{--Asal Lembaga Label--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right font-weight-bold">
                                Pilih Lembaga
                            </label>
                            <div class="col-lg-10"></div>
                        </div>

                        {{--Asal Lembaga--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                Lembaga
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2 asal-wilayah"
                                        id="lembaga"
                                        name="lembaga"
                                        style="width: 100%"
                                >
                                    <option value="" disabled selected>Pilih Lembaga</option>
                                    <option value="bnn">BNN</option>
                                    <option value="kejaksaan">Kejaksaan</option>
                                    <option value="kpk">KPK</option>
                                    <option value="pm">Polisi Militer</option>
                                </select>
                                <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Submit--}}
                        <div class="d-flex justify-content-end mb-3">
                            <button id="btn1" class="btn btn-lims-gradient d-flex align-content-center">
                                Simpan
                                <i id="loader-tiket" class="fas fa-circle-notch fa-spin ml-2 mt-1"
                                   style="display: none"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        {{--accordion 2--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingThree">
                <p class="mb-0 text-white" id="collapseThree-text">
                    2. Kasus dan Barang Bukti
                </p>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="accordionThree" data-parent="#accordion3">
                <div class="card-body">
                    {{--form start--}}
                    <form id="form-bb"
                          method="post"
                          action="{{ route('barang_bukti.store') }}"
                          enctype="multipart/form-data">
                        @csrf

                        {{--ID Tiket--}}
                        <div class="form-group row d-none">
                            <label class="col-lg-2 col-form-label text-lg-right">
                                ID Tiket
                            </label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="tiket_masuk_id"
                                       name="tiket_masuk_id"
                                       class="form-control"
                                       readonly>
                            </div>
                        </div>

                        {{--Jenis Kasus--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Jenis Kasus</label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="jenis_kasus"
                                        name="jenis_kasus"
                                        style="width: 100%"
                                >
                                    <option disabled selected value="">Pilih Jenis Kasus</option>
                                    @if (!empty($jeniskasus))
                                        @foreach ($jeniskasus as $index => $item)
                                            <option value="{{ $index }}">{{ $item }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <small id="helper-kasus" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Jenis Barang Bukti--}}
                        <div class="form-group row">
                            <label for="selectJabatan" class="col-lg-2 col-form-label text-lg-right">
                                Jenis Barang Bukti
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="selectBB"
                                        name="jenisbb_id"
                                        style="width: 100%">
                                    <option value="" disabled selected>Pilih Jenis Barang Bukti</option>
                                    @if (!empty($bidang))
                                        @foreach ($bidang as $indexBidang => $bdng)
                                            <optgroup label="{{ $bdng }}">
                                                @if (!empty($jenisbb))
                                                    @foreach ($jenisbb as $indexJenisbb => $jnsbb)
                                                        @if ($jnsbb->bidang_id == $indexBidang)
                                                            <option value="{{ $jnsbb->id }}">{{ $jnsbb->nama }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        @endforeach
                                    @endif
                                </select>
                                <small id="helper-jenisbb_id" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Keterangan--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Keterangan/Deskripsi</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="keterangan"
                                       name="keterangan"
                                       class="form-control"
                                       minlength="3">
                                <small id="helper-keterangan" class="form-text text-danger">
                                    <span class="text-muted">misal: Merk: Samsung, No. IMEI: 888888, dll</span>
                                </small>
                            </div>
                        </div>

                        {{--BB Dibuka Oleh--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Barang Bukti Dibuka Oleh</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="dibuka_oleh"
                                       name="dibuka_oleh"
                                       class="form-control"
                                       minlength="3">
                                <small id="helper-keterangan" class="form-text text-danger">
                                    <span class="text-muted"></span>
                                </small>
                            </div>
                        </div>

                        {{--Jumlah Barang Bukti--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Jumlah</label>
                            <div class="col-lg-10">
                                <input type="number"
                                       id="jumlah"
                                       name="jumlah"
                                       class="form-control"
                                       max="9999">
                                <small id="helper-jumlah" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Berat--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Berat</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="berat"
                                       name="berat"
                                       class="form-control"
                                       minlength="5">
                                <small id="helper-berat" class="form-text text-danger">
                                    <span class="text-muted">khusus Narkoba.</span>
                                </small>
                            </div>
                        </div>

                        {{--foto bb--}}
                        <div class="form-group row mb-0">
                            <label class="col-lg-2 col-form-label text-lg-right">Foto Barang Bukti</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-lims-gradient btn-file">
                                            Pilih Foto
                                            <input type="file"
                                                   name="foto_bb"
                                                   id="imgInp2"
                                                   accept=".png, .jpg, .jpeg">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <small id="helper-foto_bb" class="form-text text-danger">
                                    <span class="text-muted">nb: ukuran foto max.1MB</span>
                                </small>
                                <img id='img-upload-2'/>
                            </div>
                        </div>

                        {{--Keterangan--}}
                        <div id="keterangan-container" class="form-group row" style="display: none">
                            <label class="col-lg-2 col-form-label text-lg-right">Keterangan</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="keterangan"
                                       name="keterangan"
                                       class="form-control">
                                <small id="helper-anak_persoalan" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Tersangka 1--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Tersangka 1</label>
                            <div class="col-lg-9">
                                <input type="text"
                                       id="tersangka1"
                                       name="tersangka1"
                                       class="form-control">
                                <small id="helper-tersangka1" class="form-text text-danger"></small>
                            </div>
                            <div class="col-lg-1">
                                <button id="switch-tersangka1-a"
                                        type="button"
                                        class="btn btn-lims-gradient w-100"
                                        style="display: none">
                                    <span style="font-size: 0.7rem">Ada</span>
                                </button>
                                <button id="switch-tersangka1-b"
                                        type="button"
                                        class="btn btn-primary w-100">
                                    <span style="font-size: 0.7rem">Tidak Ada</span>
                                </button>
                            </div>
                        </div>

                        {{--Tersangka 2--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Tersangka 2</label>
                            <div class="col-lg-9">
                                <input type="text"
                                       id="tersangka2"
                                       name="tersangka2"
                                       class="form-control">
                                <small id="helper-tersangka1" class="form-text text-danger"></small>
                            </div>
                            <div class="col-lg-1">
                                <button id="switch-tersangka2-a"
                                        type="button"
                                        class="btn btn-lims-gradient w-100"
                                        style="display: none">
                                    <span style="font-size: 0.7rem">Ada</span>
                                </button>
                                <button id="switch-tersangka2-b"
                                        type="button"
                                        class="btn btn-primary w-100">
                                    <span style="font-size: 0.7rem">Tidak Ada</span>
                                </button>
                            </div>
                        </div>

                        {{--Tersangka 3--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Tersangka 3</label>
                            <div class="col-lg-9">
                                <input type="text"
                                       id="tersangka3"
                                       name="tersangka3"
                                       class="form-control"
                                >
                                <small id="helper-tersangka2" class="form-text text-danger"></small>
                            </div>
                            <div class="col-lg-1">
                                <button id="switch-tersangka3-a"
                                        type="button"
                                        class="btn btn-lims-gradient w-100"
                                        style="display: none">
                                    <span style="font-size: 0.7rem">Ada</span>
                                </button>
                                <button id="switch-tersangka3-b"
                                        type="button"
                                        class="btn btn-primary w-100">
                                    <span style="font-size: 0.7rem">Tidak Ada</span>
                                </button>
                            </div>
                        </div>

                        {{--Saksi 1--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Saksi 1</label>
                            <div class="col-lg-9">
                                <input type="text"
                                       id="saksi1"
                                       name="saksi1"
                                       class="form-control">
                                <small id="helper-saksi1" class="form-text text-danger"></small>
                            </div>
                            <div class="col-lg-1">
                                <button id="switch-saksi1-a"
                                        type="button"
                                        class="btn btn-lims-gradient w-100"
                                        style="display: none">
                                    <span style="font-size: 0.7rem">Ada</span>
                                </button>
                                <button id="switch-saksi1-b"
                                        type="button"
                                        class="btn btn-primary w-100">
                                    <span style="font-size: 0.7rem">Tidak Ada</span>
                                </button>
                            </div>
                        </div>

                        {{--Saksi 2--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Saksi 2</label>
                            <div class="col-lg-9">
                                <input type="text"
                                       id="saksi2"
                                       name="saksi2"
                                       class="form-control">
                                <small id="helper-saksi2" class="form-text text-danger"></small>
                            </div>
                            <div class="col-lg-1">
                                <button id="switch-saksi2-a"
                                        type="button"
                                        class="btn btn-lims-gradient w-100"
                                        style="display: none">
                                    <span style="font-size: 0.7rem">Ada</span>
                                </button>
                                <button id="switch-saksi2-b"
                                        type="button"
                                        class="btn btn-primary w-100">
                                    <span style="font-size: 0.7rem">Tidak Ada</span>
                                </button>
                            </div>
                        </div>

                        {{--Saksi 3--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Saksi 3</label>
                            <div class="col-lg-9">
                                <input type="text"
                                       id="saksi3"
                                       name="saksi3"
                                       class="form-control">
                                <small id="helper-saksi3" class="form-text text-danger"></small>
                            </div>
                            <div class="col-lg-1">
                                <button id="switch-saksi3-a"
                                        type="button"
                                        class="btn btn-lims-gradient w-100"
                                        style="display: none">
                                    <span style="font-size: 0.7rem">ada</span>
                                </button>
                                <button id="switch-saksi3-b"
                                        type="button"
                                        class="btn btn-primary w-100">
                                    <span style="font-size: 0.7rem">Tidak Ada</span>
                                </button>
                            </div>
                        </div>

                        {{--Dokumen Kelengkapan Mindik--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Administrasi Penyidikan</label>
                            <div class="col-lg-10 pt-2">
                                {{--Laporan Polisi--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" nama="laporan_polisi">
                                    <label class="form-check-label" for="exampleCheck1">Laporan Polisi</label>
                                </div>
                                {{--Surat Permohonan--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="surat_permohonan">
                                    <label class="form-check-label" for="exampleCheck1">Surat Permohonan</label>
                                </div>
                                {{--Sprin Penggeledahan--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="sprin_penggeledahan">
                                    <label class="form-check-label" for="exampleCheck1">Sprin Penggeledahan</label>
                                </div>
                                {{--BAP Penggeledahan--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="bap_geledah">
                                    <label class="form-check-label" for="exampleCheck1">BAP Penggeledahan</label>
                                </div>
                                {{--Sprin Penyitaan--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="sprin_bap_penyitaan">
                                    <label class="form-check-label" for="exampleCheck1">Sprin Penyitaan</label>
                                </div>
                                {{--BAP Penyitaan--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="bap_penyitaan">
                                    <label class="form-check-label" for="exampleCheck1">BAP Penyitaan</label>
                                </div>
                                {{--BAP Saksi--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="bap_saksi">
                                    <label class="form-check-label" for="exampleCheck1">BAP Saksi</label>
                                </div>
                                {{--BAP Saksi/Tersangka--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="bap_tersangka">
                                    <label class="form-check-label" for="exampleCheck1">BAP Tersangka</label>
                                </div>
                                {{--Lapju--}}
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="lapju">
                                    <label class="form-check-label" for="exampleCheck1">Laporan Kemajuan</label>
                                </div>
                            </div>
                        </div>

                        {{--Mindik Tambahan 1--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan 1</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="mindik_tambahan_1"
                                       name="mindik_tambahan_1"
                                       class="form-control"
                                >
                                <small id="helper-mindik_tambahan1" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Mindik Tambahan 2--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan 2</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="mindik_tambahan_2"
                                       name="mindik_tambahan"
                                       class="form-control"
                                >
                                <small id="helper-mindik_tambahan1" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Mindik Tambahan 3--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan 3</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       id="mindik_tambahan_3"
                                       name="mindik_tambahan_3"
                                       class="form-control"
                                >
                                <small id="helper-mindik_tambahan1" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Submit--}}
                        <div class="d-flex justify-content-end mb-3">
                            <button id="btn3"
                                    class="btn btn-lims-gradient align-content-center ml-2">Simpan
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

        {{--accordion 3--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingFour">
                <p class="mb-0 text-white" id="collapseFour-text">
                    3. Takah
                </p>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="accordionFour" data-parent="#accordion4">
                <div class="card-body">
                    {{--form start--}}
                    <form id="form-create-takah"
                          class=" mb-0"
                          method="post"
                          action="{{ route('barang_bukti.store') }}"
                          enctype="multipart/form-data">
                        @csrf

                        {{--Bidang--}}
                        <div class="form-group row">
                            <label for="selectBidang" class="col-lg-2 col-form-label text-lg-right">
                                Bidang
                            </label>
                            <div class="col-lg-10">
                                <select style="width: 100%"
                                        class="form-control select2 w-100"
                                        id="bidang_id"
                                        name="bidang_id"
                                        required>
                                    <option value="" disabled selected>Pilih Bidang</option>
                                    @foreach ($bidang as $index => $item)
                                        @if(old('bidang_id') == $index )
                                            <option value="{{$index}}" selected>{{ $item }}</option>
                                        @else
                                            <option value="{{$index}}">{{ $item }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">
                                    {{ $errors->first('bidang_id') }}
                                </small>
                            </div>
                        </div>

                        {{--SubBidang--}}
                        <div class="form-group row">
                            <label for="selectBidang" class="col-lg-2 col-form-label text-lg-right">
                                Sub Bidang
                            </label>
                            <div class="col-lg-10">
                                <select style="width: 100%"
                                        class="form-control select2"
                                        id="subbidang_id"
                                        name="subbidang_id"
                                        required>
                                    <option value="" disabled selected>Pilih Sub Bidang</option>
                                </select>
                                <small class="form-text text-danger">
                                    {{ $errors->first('subbidang_id') }}
                                </small>
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
                                       value="000001/NNF/2020/PUS"
                                       readonly>
                                <small id="helper-no_takah" class="form-text text-danger"></small>
                            </div>
                        </div>

                        {{--Submit--}}
                        <div class="d-flex justify-content-end mb-3">
                            <button id="btn4"
                                    class="btn btn-lims-gradient align-content-center ml-2"
                                    data-toggle="modal" data-target="#modalsukses">
                                Simpan
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
@endsection

@section('modals')
    <!-- Modal -->
    <div class="modal fade"
         id="modalsukses"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modalsukses"
         data-backdrop="static"
         data-keyboard="false"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <span class="d-block mb-2">
                        <i class="fas fa-check-circle fa-5x text-lims-gradient"></i>
                    </span>
                    <h5 class="mb-0 font-weight-light text-muted mb-5">
                        Takah Berhasil Dibuat.
                    </h5>
                    <hr>
                    <a role="button" href="{{ route("dummies.takah.cetakan.penerimaan", ["status" => 1]) }}"
                       class="btn btn-lims-gradient">
                        Lihat Dokumen Penerimaan BB
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

            //remote chained
            $("#polres").remoteChained({
                parents: "#polda",
                url: "../../masterdata/polres/api/select"
            });

            $("#polsek").remoteChained({
                parents: "#polres",
                url: "../../masterdata/polsek/api/select"
            });

            // chained select
            $("#subbidang_id").remoteChained({
                parents: "#bidang_id",
                url: "../../masterdata/subbidang/api/select"
            });

            // block pangkat
            $('#jenis-identitas').on('change', function () {
                $('#pangkat').val(null).trigger('change');
                const val = $(this).val();
                if (val != "nrp") {
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

            // polres clear button
            $('#polres').on('change', function () {
                $('#btn-back-1-a').hide();
                $('#btn-back-1-b').show();
            });

            // polsek clear button
            $('#polsek').on('change', function () {
                $('#btn-back-2-a').hide();
                $('#btn-back-2-b').show();
            });

            // clear polres
            $('#btn-back-1-b').on('click', function () {
                $('#polres').attr({"disabled": false});
                $('#polres').val('').trigger('change');
            });

            // clear polsek
            $('#btn-back-2-b').on('click', function () {
                $('#polsek').attr({"disabled": false});
                $('#polsek').val('').trigger('change');
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

            //tersangka2
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

            //tersangka3
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

            //saksi1
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

            //saksi3
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
                .css({'color': '#222222', 'font-weight': 'normal'});

            $('#btn1').on('click', function (event) {
                event.preventDefault();
                $('#collapseOne').hide();
                $('#collapseThree').show();
                $('#collapseThree-text').addClass("text-info font-weight-bold");
                $('#collapseOne-text').removeClass("text-info font-weight-bold");
            });

            $('#btn3').on('click', function (event) {
                event.preventDefault();
                $('#collapseThree').hide();
                $('#collapseFour').show();
                $('#collapseFour-text').addClass("text-info font-weight-bold");
                $('#collapseThree-text').removeClass("text-info font-weight-bold");
            });

            $('#btn4').on('click', function (event) {
                event.preventDefault();
            });

        });
    </script>
@endsection

