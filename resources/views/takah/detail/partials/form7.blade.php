<div class="card">
    <div class="card-header bg-primary" id="headingFour">
        <p class="mb-0 text-white" id="collapseFour-text">
            7. Yang Diserahkan
        </p>
    </div>
    <div>
        <div class="card-body">

            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">Yang Diserahkan</label>
                <div class="col-lg-10 pt-2">
                    {{--BAP Laboratoris--}}
                    <div class="form-group">
                        @if ( $takah->dokumendiserahkan->bap_laboratoris )
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label">BAP Laboratoris</label>
                    </div>
                    {{--BB--}}
                    <div class="form-group">
                        @if ( $takah->dokumendiserahkan->bb_diserahkan )
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label">Barang Bukti</label>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

