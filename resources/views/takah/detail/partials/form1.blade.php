{{--form detail 1--}}
<div class="card">
    <div class="card-header bg-primary" id="headingOne">
        <div class="d-flex justify-content-between">
            <p class="mb-0 text-white" id="collapseOne-text">
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
                    <input type="text"
                           name="tgl_surat_permintaan"
                           class="form-control"
                           value="{{  \Carbon\Carbon::parse($takah->created_at)->locale('id-ID')->isoFormat('LL')  }}"
                           readonly>
                </div>
            </div>

            {{--Jenis Identitas--}}
            <div class="form-group row">
                <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                    Jenis Identitas
                </label>
                <div class="col-lg-10">
                    <input class="form-control"
                           type="text"
                           value="{{ $takah->penyidik->jenisidentitas->nama ?? '' }}"
                           readonly>
                </div>
            </div>

            {{--No Identitas dan Pangkat--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    No. Identitas
                </label>
                <div class="col-lg-4">
                    <input class="form-control"
                           type="text"
                           value="{{ $takah->penyidik->no_identitas ?? '' }}"
                           readonly>
                </div>
                <label class="col-lg-2 col-form-label text-lg-right">
                    Pangkat
                </label>
                <div class="col-lg-4">
                    <input class="form-control"
                           type="text"
                           value="{{ $takah->penyidik->pangkat->nama ?? '' }}"
                           readonly>
                </div>
            </div>

            {{--Pengirim/Penyidik--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Nama Penyidik/Pengirim
                </label>
                <div class="col-lg-10">
                    <div class="input-group">
                        <input class="form-control"
                               type="text"
                               value="{{ $takah->penyidik->nama ?? '' }}"
                               readonly>
                    </div>
                </div>
            </div>

            {{--No HP/Telp--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    No. HP/Telp
                </label>
                <div class="col-lg-10">
                    <input class="form-control"
                           type="text"
                           value="{{ $takah->penyidik->telepon ?? '' }}"
                           readonly>
                </div>
            </div>

            {{--foto--}}
            <div class="form-group row mb-3">
                <label class="col-lg-2 col-form-label text-lg-right">Foto Penyidik/Pengirim</label>
                <div class="col-lg-10">
                    <img style="height: 100px; object-fit: cover; object-position: top"
                         src="{{ asset('storage/' . $takah->penyidik->foto ) }}" alt="foto penyidik">
                </div>
            </div>

            {{--No Surat Permintaan--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    No. Surat Permintaan
                </label>
                <div class="col-lg-10">
                    <input class="form-control"
                           type="text"
                           value="{{ $takah->nomor }}"
                           readonly>
                </div>
            </div>

            {{--Tgl Permintaan--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Tgl. Surat Permintaan
                </label>
                <div class="col-lg-10">
                    <input class="form-control"
                           type="text"
                           value="{{\Carbon\Carbon::parse($takah->detailpermintaan->tgl_surat)->locale('id-ID')->isoFormat('LL')}}"
                           readonly>
                </div>
            </div>

            {{--Asal Permintaan--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Asal Permintaan
                </label>
                <div class="col-lg-10">
                    <input class="form-control"
                           type="text"
                           value="{{ $takah->asaltakah->instansi }}"
                           readonly>
                </div>
            </div>

            @if ($takah->asaltakah->instansi === 'polri')
                {{--Satuan Wilayah Peminta Label--}}
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label text-lg-right font-weight-bold">
                        Satuan Wilayah Peminta
                    </label>
                    <div class="col-lg-10"></div>
                </div>

                @if ($takah->asaltakah->satker_id !== null)
                    {{--Direktorat--}}
                    <div class="form-group row">
                        <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                            Satker
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control"
                                   type="text"
                                   value="{{ $takah->asaltakah->satker->nama ?? '' }}"
                                   readonly>
                        </div>
                    </div>
                @endif

                @if ($takah->asaltakah->polda_id !== null)
                    {{--Polda--}}
                    <div class="form-group row">
                        <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                            Polda
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control"
                                   type="text"
                                   value="{{ $takah->asaltakah->polda->nama ?? '' }}"
                                   readonly>
                        </div>
                    </div>

                    {{--Polres--}}
                    <div class="form-group row">
                        <label for="polres" class="col-lg-2 col-form-label text-lg-right">
                            Polres
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control"
                                   type="text"
                                   value="{{ $takah->asaltakah->polres->nama ?? '' }}"
                                   readonly>
                        </div>
                    </div>

                    {{--Polsek--}}
                    <div class="form-group row">
                        <label for="polsek" class="col-lg-2 col-form-label text-lg-right">
                            Polsek
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control"
                                   type="text"
                                   value="{{ $takah->asaltakah->polsek->nama ?? '' }}"
                                   readonly>
                        </div>
                    </div>
                @endif
            @endif

            @if ($takah->asaltakah->instansi === 'nonpolri')
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
                        <input class="form-control"
                               type="text"
                               value="{{ $takah->asaltakah->lembaga->nama ?? '' }}"
                               readonly>
                    </div>
                </div>

                @if ($takah->asaltakah->keterangan_ppns != null)
                    {{--Keterangan PPNS--}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Keterangan PPNS
                        </label>
                        <div class="col-lg-10">
                            <input class="form-control"
                                   type="text"
                                   value="{{ $takah->asaltakah->keterangan_ppns ?? '' }}"
                                   readonly>
                        </div>
                    </div>
                @endif

            @endif

        </div>
    </div>
</div>

