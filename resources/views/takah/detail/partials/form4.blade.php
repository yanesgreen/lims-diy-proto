<div class="card">
    <div class="card-header bg-primary" id="keterangan-container">
        <p class="mb-0 text-white" id="collapseFour-text">
            4. Keterangan/Catatan
        </p>
    </div>
    <div>
        <div class="card-body">

            {{--Keterangan Formil Tambahan--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Keterangan Formil Tambahan
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           readonly
                           value="{{ $takah->keteranganformiltambahan->nama ?? '' }}">
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
                           readonly
                           value="{{ $takah->keteranganteknistambahan->nama ?? '' }}">
                    <small id="helper-keterangan_teknis_tambahan" class="form-text text-danger"></small>
                </div>
            </div>

            {{--Kasus Menonjol--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Kasus Menonjol
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           readonly
                           value="{{ $takah->kasus_menonjol ? 'Ya' : 'Tidak' }}">
                    <small id="helper-keterangan_teknis_tambahan" class="form-text text-danger"></small>
                </div>
            </div>

            {{--TKP Pemeriksaan--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    TKP Pemeriksaan
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           readonly
                           value="{{ $takah->pemeriksaan_tkp ? 'Ya' : 'Tidak' }}">
                    <small id="helper-keterangan_teknis_tambahan" class="form-text text-danger"></small>
                </div>
            </div>

        </div>
    </div>
</div>
