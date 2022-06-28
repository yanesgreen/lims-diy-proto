<div class="card">
    <div class="card-header bg-primary" id="headingFour">
        <h6 class="mb-0 text-white" id="collapseFour-text">
            7. Yang Diserahkan
        </h6>
    </div>
    <div>
        <div class="card-body">

            <form id="form-tambah-dokumen-diserahkan"
                  action="{{ route('takah.process.tambah_dokumen_diserahkan', $takah->id) }}"
                  method="post">
                @csrf
                @method('put')

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label text-lg-right">Yang Diserahkan</label>
                    <div class="col-lg-10 pt-2">
                        {{--BAP Laboratoris--}}
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="bap_laboratoris">
                            <label class="form-check-label">BAP Laboratoris</label>
                        </div>
                        {{--BB--}}
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="bb_diserahkan">
                            <label class="form-check-label">Barang Bukti</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit"
                            class="btn btn-primary d-flex align-content-center ml-2">
                        Simpan
                        <i id="loader-tambah-dokumen-diserahkan"
                           class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
                           style="display: none">
                        </i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

