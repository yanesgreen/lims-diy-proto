{{--form detail 2--}}
<div class="card">
    <div class="card-header bg-primary" id="headingThree">
        <h6 class="mb-0 text-white" id="collapseThree-text">
            2. Kasus dan Barang Bukti
        </h6>
    </div>
    <div>
        <div class="card-body">

            {{--Jenis Kasus--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">Jenis Kasus</label>
                <div class="col-lg-10">
                    <input class="form-control"
                           type="text"
                           value="{{ $takah->jeniskasus->nama }}"
                           readonly>
                </div>
            </div>

            {{--Barang Bukti--}}
            @if (!empty($takah->barangbukti))
                @foreach ($takah->barangbukti as $index => $result)
                    <div class="row">
                        <label class="col-lg-2 col-form-label text-lg-right">Barang Bukti {{ $index+1 }}</label>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" value="{{ $result->jenisbb->nama ?? '' }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" value="{{ $result->jumlah ?? '' }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" value="{{ $result->berat ?? '' }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            {{--Keterangan--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">Keterangan/Deskripsi</label>
                <div class="col-lg-10">
                    <input class="form-control"
                           type="text"
                           value="{{ $takah->barangbukti[0]->deskripsi ?? '' }}"
                           readonly>
                </div>
            </div>

            {{--BB Dibuka Oleh--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">Dibuka Oleh</label>
                <div class="col-lg-10">
                    <input class="form-control"
                           type="text"
                           value="{{ $takah->barangbukti[0]->dibuka_oleh ?? '' }}"
                           readonly>
                </div>
            </div>

            {{--foto bb--}}
            <div class="form-group row mb-3">
                <label class="col-lg-2 col-form-label text-lg-right">Foto Barang Bukti</label>
                <div class="col-lg-10">
                    <div class="col-lg-10">
                        <img style="height: 100px; object-fit: cover; object-position: top"
                             src="{{ asset('storage/' . $takah->foto_bb ) }}"
                             alt="foto bb">
                    </div>
                </div>
            </div>

            {{--Tersangka--}}
            @if (!empty($takah->tersangka))
                @foreach ($takah->tersangka as $index => $tersangka)
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Tersangka</label>
                        <div class="col-lg-10">
                            <input class="form-control"
                                   type="text"
                                   value="{{ $tersangka->nama }}"
                                   readonly>
                        </div>
                    </div>
                @endforeach
            @endif

            {{--Saksi--}}
            @if (!empty($takah->saksi))
                @foreach ($takah->saksi as $index => $saksi)
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Saksi {{ $index+1 }}</label>
                        <div class="col-lg-10">
                            <input class="form-control"
                                   type="text"
                                   value="{{ $saksi->nama }}"
                                   readonly>
                        </div>
                    </div>
                @endforeach
            @endif

            {{--Dokumen Kelengkapan Mindik--}}
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">Administrasi Penyidikan</label>
                <div class="col-lg-10 pt-2">
                    {{--Laporan Polisi--}}
                    <div class="form-group">
                        @if ($takah->mindik->laporan_polisi)
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label" for="exampleCheck1">Laporan Polisi</label>
                    </div>
                    {{--Surat Permohonan--}}
                    <div class="form-group">
                        @if ($takah->mindik->surat_permohonan)
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label" for="exampleCheck1">Surat Permohonan</label>
                    </div>
                    {{--Sprin Penggeledahan--}}
                    <div class="form-group">
                        @if ($takah->mindik->sprin_penggeledahan)
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label" for="exampleCheck1">Sprin Penggeledahan</label>
                    </div>
                    {{--BAP Penggeledahan--}}
                    <div class="form-group">
                        @if ($takah->mindik->bap_penggeledahan)
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label" for="exampleCheck1">BAP Penggeledahan</label>
                    </div>
                    {{--Sprin Penyitaan--}}
                    <div class="form-group">
                        @if ($takah->mindik->sprin_penyitaan)
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label" for="exampleCheck1">Sprin Penyitaan</label>
                    </div>
                    {{--BAP Penyitaan--}}
                    <div class="form-group">
                        @if ($takah->mindik->bap_penyitaan)
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label" for="exampleCheck1">BAP Penyitaan</label>
                    </div>
                    {{--BAP Saksi--}}
                    <div class="form-group">
                        @if ($takah->mindik->bap_saksi)
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label" for="exampleCheck1">BAP Saksi</label>
                    </div>
                    {{--BAP Saksi/Tersangka--}}
                    <div class="form-group">
                        @if ($takah->mindik->bap_tersangka)
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label" for="exampleCheck1">BAP Tersangka</label>
                    </div>
                    {{--Lapju--}}
                    <div class="form-group">
                        @if ($takah->mindik->laporan_kemajuan)
                            <i class="fas fa-check-square" style="color: royalblue"></i>
                        @else
                            <i class="far fa-square" style="color: royalblue"></i>
                        @endif
                        <label class="form-check-label" for="exampleCheck1">Laporan Kemajuan</label>
                    </div>
                </div>
            </div>

            {{--Mindik Tambahan 1--}}
            @if (!empty($takah->mindiktambahan))
                @foreach ($takah->mindiktambahan as $index => $mindiktambahan)
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan {{ $index+1 }}</label>
                        <div class="col-lg-10">
                            <input type="text"
                                   class="form-control"
                                   value="{{ $mindiktambahan->nama }}"
                                   readonly>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>

