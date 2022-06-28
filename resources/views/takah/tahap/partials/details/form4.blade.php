<div class="card">
    <div class="card-header bg-primary" id="keterangan-container">
        <h6 class="mb-0 text-white" id="collapseFour-text">
            4. Keterangan/Catatan
        </h6>
    </div>
    <div>
        <div class="card-body">

            @if ($takah->keteranganformiltambahan)
                <form action="{{ route('takah.update.keterangan_formil_tambahan', $takah->id) }}"
                      method="post">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Keterangan Formil Tambahan
                        </label>
                        <div class="col-lg-9">
                            <input type="text"
                                   class="form-control"
                                   readonly
                                   value="{{ $takah->keteranganformiltambahan->nama ?? '' }}">
                        </div>
                        @if (Auth::user()->role->id === 3)
                            <div class="col-lg-1">
                                <button id="btn-keterangan_formil_tambahan"
                                        type="submit"
                                        class="btn btn-lims-gradient d-flex align-content-center justify-content-center d-block w-100">
                                    <span id="text-keterangan_formil_tambahan">Lengkap</span>
                                    <i id="loader-keterangan_formil_tambahan"
                                       class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
                                       style="display: none">
                                    </i>
                                </button>
                            </div>
                        @else
                            <div class="col-lg-1">
                                <button
                                    class="btn btn-dark d-flex align-content-center justify-content-center d-block w-100"
                                    disabled>
                                    <span id="text-keterangan_formil_tambahan">...</span>
                                    <i id="loader-keterangan_formil_tambahan"
                                       class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
                                       style="display: none">
                                    </i>
                                </button>
                            </div>
                        @endif
                    </div>
                </form>
            @else
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
            @endif

            @if ($takah->keteranganteknistambahan)
                <form action="{{ route('takah.update.keterangan_teknis_tambahan', $takah->id) }}"
                      method="post">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">
                            Keterangan Teknis Tambahan
                        </label>
                        <div class="col-lg-9">
                            <input type="text"
                                   class="form-control"
                                   readonly
                                   value="{{ $takah->keteranganteknistambahan->nama ?? '' }}">
                            <small id="helper-keterangan_teknis_tambahan" class="form-text text-danger"></small>
                        </div>
                        @if (Auth::user()->role->id === 3)
                            <div class="col-lg-1">
                                <button id="btn-keterangan_teknis_tambahan"
                                        type="submit"
                                        class="btn btn-lims-gradient d-flex align-content-center justify-content-center d-block w-100">
                                    <span id="text-keterangan_teknis_tambahan">Lengkap</span>
                                    <i id="loader-keterangan_teknis_tambahan"
                                       class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
                                       style="display: none">
                                    </i>
                                </button>
                            </div>
                        @else
                            <div class="col-lg-1">
                                <button
                                    class="btn btn-dark d-flex align-content-center justify-content-center d-block w-100"
                                    disabled>
                                    <span id="text-keterangan_formil_tambahan">...</span>
                                    <i id="loader-keterangan_formil_tambahan"
                                       class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
                                       style="display: none">
                                    </i>
                                </button>
                            </div>
                        @endif
                    </div>
                </form>
            @else
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
            @endif

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
