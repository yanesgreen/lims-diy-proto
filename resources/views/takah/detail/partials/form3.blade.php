{{--form detail 3--}}
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
                    <input type="text"
                           class="form-control"
                           value="{{ $takah->bidang->nama }}"
                           readonly>
                </div>
            </div>

            {{--SubBidang--}}
            <div class="form-group row">
                <label for="selectBidang" class="col-lg-2 col-form-label text-lg-right">
                    Sub Bidang
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           value="{{ $takah->subbidang->nama }}"
                           readonly>
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
                           value="{{ $takah->nomor}}"
                           readonly>
                    <small id="helper-no_takah" class="form-text text-danger"></small>
                </div>
            </div>

        </div>
    </div>
</div>

