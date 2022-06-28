@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Tahap II
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
                    <p class="mb-0 text-white text-info" id="collapseOne-text">
                        1. Identitas Penyidik/Pengirim
                    </p>
                    <i id="tiket-masuk-check" class="fas fa-check text-info" style="display: none"></i>
                </div>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="accordionOne" data-parent="#accordion1">
                <div class="card-body">
                    {{--Tgl Penerimaan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Tgl. Penerimaan
                        </label>
                        <div class="col-lg-10">
                            <input type="date"
                                   name="tgl_surat_permintaan"
                                   class="form-control"
                                   value="1 Juli 2020"
                                   readonly>
                        </div>
                    </div>

                    {{--Jenis Identitas--}}
                    <div class="form-group row">
                        <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                            Jenis Identitas
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="KTP" readonly>
                        </div>
                    </div>

                    {{--No Identitas dan Pangkat--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            No. Identitas
                        </label>
                        <div class="col-lg-4">
                            <input class="form-control" type="text" value="9008898900" readonly>
                        </div>
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Pangkat
                        </label>
                        <div class="col-lg-4">
                            <input class="form-control" type="text" value="IPTU" readonly>
                        </div>
                    </div>

                    {{--Pengirim/Penyidik--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Nama Penyidik/Pengirim
                        </label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input class="form-control" type="text" value="John Doe" readonly>
                            </div>
                        </div>
                    </div>

                    {{--No HP/Telp--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            No. HP/Telp
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="0898967989" readonly>
                        </div>
                    </div>

                    {{--foto--}}
                    <div class="form-group row mb-3">
                        <label class="col-lg-2 col-form-label text-lg-right">Foto Penyidik/Pengirim</label>
                        <div class="col-lg-10">
                            <img style="height: 100px; object-fit: cover; object-position: top"
                                 src="{{ asset('storage/avatars/yanesgreen_1575432371.jpg') }}" alt="foto penyidik">
                        </div>
                    </div>

                    {{--No Surat Permintaan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            No. Surat Permintaan
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="008998/0990/09088" readonly>
                        </div>
                    </div>

                    {{--Tgl Permintaan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Tgl. Surat Permintaan
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="29 Maret 2020" readonly>
                        </div>
                    </div>

                    {{--Asal Permintaan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Asal Permintaan
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="POLRI" readonly>
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
                            <input class="form-control" type="text" value="Satwil" readonly>
                        </div>
                    </div>

                    {{--Direktorat--}}
                    <div class="form-group row">
                        <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                            Satker
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="" readonly>
                        </div>
                    </div>

                    {{--Polda--}}
                    <div class="form-group row">
                        <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                            Polda
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Polda Metro Jaya" readonly>
                        </div>
                    </div>

                    {{--Polres--}}
                    <div class="form-group row">
                        <label for="polres" class="col-lg-2 col-form-label text-lg-right">
                            Polres
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Polres Metro Jakarta Pusat" readonly>
                        </div>
                    </div>

                    {{--Polsek--}}
                    <div class="form-group row">
                        <label for="polsek" class="col-lg-2 col-form-label text-lg-right">
                            Polsek
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Polsek Tanah Abang" readonly>
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
                            <input class="form-control" type="text" value="" readonly>
                        </div>
                    </div>

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
            <div>
                <div class="card-body">

                    {{--Jenis Kasus--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Jenis Kasus</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Penyalahgunaan Narkoba" readonly>
                        </div>
                    </div>

                    {{--Jenis Barang Bukti--}}
                    <div class="form-group row">
                        <label for="selectJabatan" class="col-lg-2 col-form-label text-lg-right">
                            Jenis Barang Bukti
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Bahan Narkotika Dasar" readonly>
                        </div>
                    </div>

                    {{--Keterangan--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Keterangan/Deskripsi</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="" readonly>
                        </div>
                    </div>

                    {{--BB Dibuka Oleh--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Barang Bukti Dibuka Oleh</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Ahmad Arifin" readonly>
                        </div>
                    </div>

                    {{--Jumlah Barang Bukti--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Jumlah</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="1" readonly>
                        </div>
                    </div>

                    {{--Berat--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Berat</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="100 gram" readonly>
                        </div>
                    </div>

                    {{--foto bb--}}
                    <div class="form-group row mb-3">
                        <label class="col-lg-2 col-form-label text-lg-right">Foto Barang Bukti</label>
                        <div class="col-lg-10">
                            <div class="col-lg-10">
                                <img style="height: 100px; object-fit: cover; object-position: top"
                                     src="{{ asset('images/narkobafor.jpg') }}" alt="foto bb">
                            </div>
                        </div>
                    </div>

                    {{--Keterangan--}}
                    <div id="keterangan-container" class="form-group row mb-3" style="display: none">
                        <label class="col-lg-2 col-form-label text-lg-right">Keterangan</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="" readonly>
                        </div>
                    </div>

                    {{--Tersangka 1--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Tersangka 1</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Nikita Mirjoni" readonly>
                        </div>
                    </div>

                    {{--Tersangka 2--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Tersangka 2</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Mira Misuh" readonly>
                        </div>
                    </div>

                    {{--Tersangka 3--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Tersangka 3</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="" readonly>
                        </div>
                    </div>

                    {{--Saksi 1--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Saksi 1</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Vika Kirin" readonly>
                        </div>
                    </div>

                    {{--Saksi 2--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Saksi 2</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="Indra Leslie" readonly>
                        </div>
                    </div>

                    {{--Saksi 3--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Saksi 3</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="" readonly>
                        </div>
                    </div>

                    {{--Dokumen Kelengkapan Mindik--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Administrasi Penyidikan</label>
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
                            {{--Sprin Penggeledahan--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="sprin_penggeledahan" checked>
                                <label class="form-check-label" for="exampleCheck1">Sprin Penggeledahan</label>
                            </div>
                            {{--BAP Penggeledahan--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="bap_geledah" checked>
                                <label class="form-check-label" for="exampleCheck1">BAP Penggeledahan</label>
                            </div>
                            {{--Sprin Penyitaan--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="sprin_bap_penyitaan" checked>
                                <label class="form-check-label" for="exampleCheck1">Sprin Penyitaan</label>
                            </div>
                            {{--BAP Penyitaan--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="bap_penyitaan" checked>
                                <label class="form-check-label" for="exampleCheck1">BAP Penyitaan</label>
                            </div>
                            {{--BAP Saksi--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="bap_saksi" checked>
                                <label class="form-check-label" for="exampleCheck1">BAP Saksi</label>
                            </div>
                            {{--BAP Saksi/Tersangka--}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="bap_tersangka" checked>
                                <label class="form-check-label" for="exampleCheck1">BAP Tersangka</label>
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
                        <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan 1</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="" readonly>
                            <small id="helper-mindik_tambahan1" class="form-text text-danger"></small>
                        </div>
                    </div>

                    {{--Mindik Tambahan 2--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan 2</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="" readonly>
                            <small id="helper-mindik_tambahan1" class="form-text text-danger"></small>
                        </div>
                    </div>

                    {{--Mindik Tambahan 3--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan 3</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="" readonly>
                            <small id="helper-mindik_tambahan1" class="form-text text-danger"></small>
                        </div>
                    </div>

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
            <div>
                <div class="card-body">

                    {{--Bidang--}}
                    <div class="form-group row">
                        <label for="selectBidang" class="col-lg-2 col-form-label text-lg-right">
                            Bidang
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="Narkotika dan Obat Berbahaya Forensik"
                                   readonly>
                        </div>
                    </div>

                    {{--SubBidang--}}
                    <div class="form-group row">
                        <label for="selectBidang" class="col-lg-2 col-form-label text-lg-right">
                            Sub Bidang
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="Sub Bidang Psikotropika" readonly>
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

                </div>
            </div>
        </div>

        {{--accordion 4--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingFour">
                <p class="mb-0 text-white" id="collapseFour-text">
                    4. Keterangan/Catatan
                </p>
            </div>
            <div>
                <div class="card-body">
                    {{--Keterangan Formil--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Kelengkapan Formil
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="Lengkap" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Keterangan Formil Tambahan
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>

                    {{--Keterangan Teknis--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Kelengkapan Teknis
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="Lengkap" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Keterangan Teknis Tambahan
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{--accordion 5--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingFour">
                <p class="mb-0 text-white" id="collapseFour-text">
                    5. Pemeriksa Forensik
                </p>
            </div>
            <div>
                <div id="pemeriksa-container" class="card-body">
                    {{--Pemeriksa BB--}}
                    @if (!Request::get("status"))
                        <div class="form-group row">
                            <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                                Nama Pemeriksa I
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="pemeriksa1"
                                        name="pemeriksa1"
                                        style="width: 100%"
                                        multiple>
                                    <option value="bidang1">Penata Agus Dwi Setyono</option>
                                    <option value="bidang2">Pembina Hasna Saputra</option>
                                    <option value="bidang3">Bripda Devitia Dinda Pitaloka</option>
                                    <option value="bidang4">Bripda Haikal Setiad</option>
                                    <option value="bidang4">IPTU Tri Agung Nugroho</option>
                                    <option value="bidang4">AKP Tris Zeno Alkindi</option>
                                    <option value="bidang4">AKP Panji Zulfikar</option>
                                    <option value="bidang4">Kompol Heri Priyanto</option>
                                </select>
                                <small id="helper-bidang" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                                Nama Pemeriksa II
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="pemeriksa2"
                                        name="pemeriksa2"
                                        style="width: 100%">
                                    <option value="bidang1">Penata Agus Dwi Setyono</option>
                                    <option value="bidang2">Pembina Hasna Saputra</option>
                                    <option value="bidang3">Bripda Devitia Dinda Pitaloka</option>
                                    <option value="bidang4">Bripda Haikal Setiad</option>
                                    <option value="bidang4">IPTU Tri Agung Nugroho</option>
                                    <option value="bidang4">AKP Tris Zeno Alkindi</option>
                                    <option value="bidang4">AKP Panji Zulfikar</option>
                                    <option value="bidang4">Kompol Heri Priyanto</option>
                                </select>
                                <small id="helper-bidang" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                                Nama Pemeriksa III
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="pemeriksa3"
                                        name="pemeriksa3"
                                        style="width: 100%"
                                        multiple>
                                    <option value="bidang1">Penata Agus Dwi Setyono</option>
                                    <option value="bidang2">Pembina Hasna Saputra</option>
                                    <option value="bidang3">Bripda Devitia Dinda Pitaloka</option>
                                    <option value="bidang4">Bripda Haikal Setiad</option>
                                    <option value="bidang4">IPTU Tri Agung Nugroho</option>
                                    <option value="bidang4">AKP Tris Zeno Alkindi</option>
                                    <option value="bidang4">AKP Panji Zulfikar</option>
                                    <option value="bidang4">Kompol Heri Priyanto</option>
                                </select>
                                <small id="helper-bidang" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                                Nama Pemeriksa IV
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2"
                                        id="pemeriksa4"
                                        name="pemeriksa4"
                                        style="width: 100%"
                                        multiple>
                                    <option value="bidang1">Penata Agus Dwi Setyono</option>
                                    <option value="bidang2">Pembina Hasna Saputra</option>
                                    <option value="bidang3">Bripda Devitia Dinda Pitaloka</option>
                                    <option value="bidang4">Bripda Haikal Setiad</option>
                                    <option value="bidang4">IPTU Tri Agung Nugroho</option>
                                    <option value="bidang4">AKP Tris Zeno Alkindi</option>
                                    <option value="bidang4">AKP Panji Zulfikar</option>
                                    <option value="bidang4">Kompol Heri Priyanto</option>
                                </select>
                                <small id="helper-bidang" class="form-text text-danger"></small>
                            </div>
                        </div>
                    @endif

                    {{--Pemeriksa BB Dummy--}}
                    @if (Request::get("status") == "done")
                        <div class="form-group row">
                            <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                                Nama Pemeriksa
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control mb-1" value="Yudi C - 08101971" readonly>
                                <input type="text" class="form-control mb-1" value="Yudi A - 08101988" readonly>
                            </div>
                        </div>
                    @endif

                    {{--Submit--}}
                    @if (!Request::get("status"))
                        <div class="d-flex justify-content-end mb-3">
                            <button id="btn-pemeriksa" class="btn btn-lims-gradient d-flex align-content-center">
                                Simpan
                                <i id="loader-tiket"
                                   class="fas fa-circle-notch fa-spin ml-2 mt-1"
                                   style="display: none">
                                </i>
                            </button>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{--accordion 6--}}
        @if (!Request::get("status"))
            <div class="card">
                <div class="card-header bg-primary" id="headingFour">
                    <p class="mb-0 text-white" id="collapseFour-text">
                        6. Upload BAP Laboratoris
                    </p>
                </div>
                <div>
                    <div id="bap-container" class="card-body" style="display: none">

                        {{--Upload BB Real--}}
                        @if (!Request::get("status"))
                            {{--Upload BB Form--}}
                            <div class="form-group row mb-0">
                                <label class="col-lg-2 col-form-label text-lg-right">Pilih BAP</label>
                                <div class="col-lg-10">
                                    <div class="input-group mb-5">
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input"
                                                   id="file-upload"
                                                   aria-describedby="inputGroupFileAddon01"
                                                   accept=".pdf">
                                            <label id="file-name" class="custom-file-label" for="inputGroupFile01">
                                                Pilih file
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{--Upload BB Dummy--}}
                        @if (Request::get("status") == "done")
                            {{--Upload BB Form--}}
                            <div class="form-group row mb-0">
                                <label class="col-lg-2 col-form-label text-lg-right">Pilih BAP</label>
                                <div class="col-lg-10">
                                    <a name="" id="" class="btn btn-lims-gradient" href="#" role="button">
                                        Lihat BAP
                                    </a>
                                </div>
                            </div>
                        @endif

                        {{--Submit--}}
                        @if (!Request::get("status"))
                            <div class="d-flex justify-content-end mb-3">
                                <button class="btn btn-lims-gradient d-flex align-content-center"
                                        data-toggle="modal"
                                        data-target="#modalsukses">
                                    Simpan
                                    <i id="loader-tiket"
                                       class="fas fa-circle-notch fa-spin ml-2 mt-1"
                                       style="display: none">
                                    </i>
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @endif

        {{--accordion 6--}}
        @if (Request::get("status") == "done")
            <div class="card">
                <div class="card-header bg-primary" id="headingFour">
                    <p class="mb-0 text-white" id="collapseFour-text">
                        6. Upload BAP Laboratoris (Opsional)
                    </p>
                </div>
            </div>
        @endif

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
                        Pemeriksa dan BAP Berhasil Disimpan.
                    </h5>
                    <hr>
                    <a role="button" href="{{ route("dashboard") }}"
                       class="btn btn-lims-gradient">
                        Kembali Ke Dashboard
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
            $('.select2').select2();
            $("#file-upload").change(function () {
                $("#file-name").text(this.files[0].name);
            });

            // upload pemeriksa
            $('#btn-pemeriksa').on('click', () => {
                $('#bap-container').show();
                $('#pemeriksa-container').hide();
            });
        });
    </script>
@endsection



