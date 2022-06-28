<div class="card">
    <div class="card-header bg-primary" id="headingFour">
        <h6 class="mb-0 text-white">
            6. Upload BAP Laboratoris
        </h6>
    </div>
    <div>
        <div id="bap-container" class="card-body" style="display: none">

            <form id="form-simpan-bap"
                  action="{{ route('takah.process.simpan_bap', $takah->id) }}"
                  enctype="multipart/form-data"
                  method="post">
                @csrf
                @method('PUT')
                <div class="form-group row mb-0">
                    <label class="col-lg-2 col-form-label text-lg-right">Pilih BAP</label>
                    <div class="col-lg-10">
                        <div class="input-group mb-5">
                            <div class="custom-file">
                                <input type="file"
                                       class="custom-file-input"
                                       name="bap"
                                       id="bap"
                                       accept=".pdf">
                                <label id="file-name" class="custom-file-label" for="inputGroupFile01">
                                    Pilih file
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit"
                            class="btn btn-primary d-flex align-content-center">
                        Simpan/Lewati
                        <i id="loader-simpan-bap"
                           class="fas fa-circle-notch fa-spin ml-2 mt-1"
                           style="display: none">
                        </i>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

