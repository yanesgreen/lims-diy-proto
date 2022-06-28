<!-- Modal Serahkan Ke Kaurmin-->
<div class="modal fade"
     id="modal-serahkan-ke-kaurmin"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal-serahkan-ke-kaurmin"
     data-backdrop="static"
     data-keyboard="false"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                    <span class="d-block mb-2">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                <h5 class="mb-0 font-weight-light text-muted mb-5">
                    Takah Berhasil Diserahkan Ke Kaurmin.
                </h5>
                <hr>
                <a role="button" href="{{ route("dashboard") }}"
                   class="btn btn-primary">
                    Kembali Ke dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Keterangan Takah-->
<div class="modal fade"
     id="modal-tambah-keterangan-takah"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal-tambah-keterangan-takah"
     data-backdrop="static"
     data-keyboard="false"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                    <span class="d-block mb-2">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                <h5 id="modal-tambah-keterangan-takah-title" class="mb-0 font-weight-light text-muted mb-5"></h5>
                <hr>
                <a role="button" href="{{ route("dashboard") }}"
                   class="btn btn-primary">
                    Kembali Ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pemeriksaan TKP-->
<div class="modal fade"
     id="modal-tambah-pemeriksaantkp"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal-tambah-pemeriksaantkp"
     data-backdrop="static"
     data-keyboard="false"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                    <span class="d-block mb-2">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                <h5 id="modal-tambah-pemeriksaantkp-title" class="mb-0 font-weight-light text-muted mb-5"></h5>
                <hr>
                <a role="button" href="{{ route("dashboard") }}"
                   class="btn btn-primary">
                    Kembali Ke dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pemeriksa-->
<div class="modal fade"
     id="modal-tambah-pemeriksa"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal-tambah-pemeriksa"
     data-backdrop="static"
     data-keyboard="false"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                    <span class="d-block mb-2">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                <h5 id="modal-tambah-pemeriksa-title" class="mb-0 font-weight-light text-muted mb-5"></h5>
                <hr>
                <a type="button"
                   id="open-bap-container"
                   class="btn btn-primary text-white">
                    Lanjut Ke Proses Selanjutnya
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Simpan BAP-->
<div class="modal fade"
     id="modal-simpan-bap"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal-simpan-bap"
     data-backdrop="static"
     data-keyboard="false"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                    <span class="d-block mb-2">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                <h5 id="modal-simpan-bap-title" class="mb-0 font-weight-light text-muted mb-5"></h5>
                <hr>
                <a role="button"
                   href="{{ route('dashboard') }}"
                   class="btn btn-primary">
                    Serahkan Takah
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Dokumen Diserahkan-->
<div class="modal fade"
     id="modal-tambah-dokumen-diserahkan"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal-tambah-dokumen-diserahkan"
     data-backdrop="static"
     data-keyboard="false"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                    <span class="d-block mb-2">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                <h5 id="modal-tambah-dokumen-diserahkan-title" class="mb-0 font-weight-light text-muted mb-5"></h5>
                <hr>
                <a role="button"
                   href="{{ route('dashboard.urtu2') }}"
                   class="btn btn-primary">
                    Lanjutkan Proses
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Simpan Penyidik Penerima -->
<div class="modal fade"
     id="modal-simpan-penyidik-penerima"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal-simpan-penyidik-penerima"
     data-backdrop="static"
     data-keyboard="false"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                   <span id="modal-simpan-penyidik-penerima-icon" style="display: none">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                <span id="modal-simpan-penyidik-penerima-icon-failed" style="display: none">
                        <i class="fas fa-times-circle fa-5x text-dark"></i>
                    </span>
                <h5 id="modal-simpan-penyidik-penerima-title" class="mt-3 mb-0 font-weight-light text-muted"></h5>
                <p id="modal-simpan-penyidik-penerima-text"></p>
                <hr>
                <button type="button"
                        id="modal-simpan-penyidik-penerima-btn-failed"
                        class="btn btn-primary"
                        data-dismiss="modal">
                    Tutup
                </button>
                <a role="button"
                   id="modal-simpan-penyidik-penerima-btn-sukses"
                   href=""
                   class="btn btn-primary"
                   style="display: none">
                    Lihat Dokumen
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Simpan Feedback -->
<div class="modal fade"
     id="modal-simpan-feedback"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal-simpan-feedback"
     data-backdrop="static"
     data-keyboard="false"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                    <span class="d-block mb-2">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                <h5 id="modal-simpan-feedback-title" class="mb-0 font-weight-light text-muted mb-5"></h5>
                <hr>
                <a role="button"
                   href="{{ route('takah.cetakan.penyerahan', $takah->id) }}"
                   class="btn btn-primary">
                    Lihat Dokumen Penyerahan
                </a>
            </div>
        </div>
    </div>
</div>

