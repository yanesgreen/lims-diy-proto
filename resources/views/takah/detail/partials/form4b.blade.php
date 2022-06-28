<div class="card">
    <div class="card-header bg-primary" id="keterangan-container">
        <p class="mb-0 text-white" id="collapseFour-text">
            5. Kasus Menonjol
        </p>
    </div>
    <div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Kasus Menonjol
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           readonly
                           value="{{ $takah->kasus_menonjol ? 'Ya' : 'Tidak' }}">
                </div>
            </div>
        </div>
    </div>
</div>
