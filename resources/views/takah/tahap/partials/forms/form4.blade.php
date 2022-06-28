<div class="card">
    <div class="card-header bg-primary" id="headingFour">
        <h6 class="mb-0 text-white" id="collapseFour-text">
            4. Keterangan/Catatan
        </h6>
    </div>
    <div id="keterangan-takah-container" class="card-body">

        <form id="form-tambah-keterangan-takah"
              method="post"
              action="{{ route('takah.process.tambah_kelengkapan_takah', $takah->id) }}">
            @csrf
            @method('PUT')

            {{--Keterangan Formil--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Kelengkapan Formil
                </label>
                <div class="col-lg-10">
                    <select class="form-control select2"
                            id="kelengkapan_formil"
                            name="kelengkapan_formil"
                            style="width: 100%"
                    >
                        <option value="" selected disabled>Pilih</option>
                        <option value="lengkap">Lengkap</option>
                        <option value="tdk_lengkap">Tidak Lengkap</option>
                    </select>
                    <small id="helper-kelengkapan_formil" class="form-text text-danger"></small>
                </div>
            </div>

            {{--Keterangan Formil Tambahan--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Keterangan Formil Tambahan
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           id="keterangan_formil_tambahan"
                           name="keterangan_formil_tambahan">
                    <small id="helper-keterangan_formil_tambahan" class="text-danger"></small>
                </div>
            </div>

            {{--Keterangan Teknis--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Kelengkapan Teknis
                </label>
                <div class="col-lg-10">
                    <select class="form-control select2"
                            id="kelengkapan_teknis"
                            name="kelengkapan_teknis"
                            style="width: 100%"
                    >
                        <option value="" selected disabled>Pilih</option>
                        <option value="lengkap">Lengkap</option>
                        <option value="tdk_lengkap">Tidak Lengkap</option>
                    </select>
                    <small id="helper-kelengkapan_teknis" class="form-text text-danger"></small>
                </div>
            </div>
            {{--Keterangan Teknis Tambahan--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Keterangan Teknis Tambahan
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           id="keterangan_teknis_tambahan"
                           name="keterangan_teknis_tambahan">
                    <small id="helper-keterangan_teknis_tambahan" class="form-text text-danger"></small>
                </div>
            </div>

            {{--Kasus Menonjol--}}
            <div class="form-group row">
                <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                    Kasus Menonjol
                </label>
                <div class="col-lg-10">
                    <select class="form-control select2"
                            id="kasus_menonjol"
                            name="kasus_menonjol"
                            style="width: 100%">
                        <option value="" disabled selected>Pilih</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                    <small id="helper-kasus_menonjol" class="form-text text-danger"></small>
                </div>
            </div>

            {{--Pemeriksaan TKP--}}
            <div class="form-group row">
                <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                    Pemeriksaan TKP
                </label>
                <div class="col-lg-10">
                    <select class="form-control select2"
                            id="pemeriksaantkp"
                            name="pemeriksaantkp"
                            style="width: 100%">
                        <option value="" disabled selected>Pilih</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                    <small id="helper-pemeriksaantkp" class="form-text text-danger"></small>
                </div>
            </div>

            {{--Submit--}}
            <div class="d-flex justify-content-end mb-3">
                <button type="submit"
                        class="btn btn-primary d-flex align-content-center ml-2">
                    Simpan
                    <i id="loader-tambah-keterangan-takah"
                       class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
                       style="display: none">
                    </i>
                </button>
            </div>

        </form>

    </div>
</div>
