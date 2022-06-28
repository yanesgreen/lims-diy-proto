<div class="card">
    <div class="card-header bg-primary" id="keterangan-container">
        <p class="mb-0 text-white" id="collapseFour-text">
            6. Pemeriksaan TKP
        </p>
    </div>
    <div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Pemeriksaan TKP
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           readonly
                           value="{{ $takah->pemeriksaan_tkp ? 'Ya' : 'Tidak' }}">
                </div>
            </div>
        </div>
    </div>
