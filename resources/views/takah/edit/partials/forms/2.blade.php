<form id="form-update-jeniskasus-barangbukti-mindik"
      method="post"
      action="{{ route('takah.update.jeniskasus_barangbukti_mindik', $takah->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('put')

    {{--Jenis Kasus--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Jenis Kasus</label>
        <div class="col-lg-10">
            <select class="form-control select2" id="jeniskasus" name="jeniskasus_id" style="width: 100%">
                <option disabled selected value="">Pilih Jenis Kasus</option>
                @if (!empty($jeniskasus))
                    @foreach ($jeniskasus as $index => $item)
                        <option value="{{ $index }}" {{ ($takah->jeniskasus->id === $index ? 'selected': '') }}>
                            {{ $item }}
                        </option>
                    @endforeach
                @endif
            </select>
            <small id="helper-jeniskasus_id" class="form-text text-danger"></small>
        </div>
    </div>

    {{--BB Dibuka Oleh--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Dibuka Oleh</label>
        <div class="col-lg-10">
            <input type="text"
                   id="dibuka_oleh"
                   name="dibuka_oleh"
                   class="form-control"
                   value="{{ $takah->dibuka_oleh }}"
                   minlength="3">
            <small id="helper-dibuka-oleh" class="form-text text-danger">
                <span class="text-muted"></span>
            </small>
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
    <div class="form-group row mb-4">
        <div class="col-12 d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('barangbukti.index', $takah->id) }}" role="button">
                Edit Barang Bukti
            </a>
        </div>
    </div>

    {{--Tersangka--}}
    @if (!empty($takah->tersangka)){{--kalau array $results gak kosong--}}
    @foreach ($takah->tersangka as $index => $result){{--loop data--}}
    <div class="form-group row mb-3">
        <label class="col-lg-2 col-form-label text-lg-right">Tersangka</label>
        <div class="col-lg-10">
            <input type="text"
                   id="tersangka{{ $index }}"
                   name="tersangka{{ $index }}"
                   class="form-control"
                   value="{{ $result->nama }}">
            <small id="helper-tersangka{{ $index }}" class="form-text text-danger"></small>
        </div>
    </div>
    @endforeach
    @endif


    {{--Saksi 1--}}
    @if (!empty($takah->saksi)){{--kalau array $results gak kosong--}}
    @foreach ($takah->saksi as $index => $result){{--loop data--}}
    <div class="form-group row mb-3">
        <label class="col-lg-2 col-form-label text-lg-right">Saksi {{ $index+1 }}</label>
        <div class="col-lg-10">
            <input type="text"
                   id="saksi{{ $index }}"
                   name="saksi{{ $index }}"
                   class="form-control"
                   value="{{ $result->nama }}">
            <small id="helper-saksi{{ $index }}" class="form-text text-danger"></small>
        </div>
    </div>
    @endforeach
    @endif

    {{--Mindik ID--}}
    <div class="form-group row d-none">
        <label for="selectJabatan" class="col-lg-2 col-form-label text-lg-right">
            Mindik ID
        </label>
        <div class="col-lg-10">
            <input type="text" name="mindik_id" class="form-control" value="{{ $takah->mindik_id }}" readonly>
        </div>
    </div>

    {{--Dokumen Kelengkapan Mindik--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Administrasi Penyidikan</label>
        <div class="col-lg-10 pt-2">
            {{--Laporan Polisi--}}
            <div class="form-group form-check">
                <input type="checkbox"
                       class="form-check-input"
                       name="laporan_polisi"
                    {{ $takah->mindik->laporan_polisi === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">Laporan Polisi</label>
            </div>
            {{--Surat Permohonan--}}
            <div class="form-group form-check">
                <input type="checkbox"
                       class="form-check-input"
                       name="surat_permohonan"
                    {{ $takah->mindik->surat_permohonan === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">Surat Permohonan</label>
            </div>
            {{--Sprin Penggeledahan--}}
            <div class="form-group form-check">
                <input type="checkbox"
                       class="form-check-input"
                       name="sprin_penggeledahan"
                    {{ $takah->mindik->sprin_penggeledahan === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">Sprin Penggeledahan</label>
            </div>
            {{--BAP Penggeledahan--}}
            <div class="form-group form-check">
                <input
                    type="checkbox"
                    class="form-check-input"
                    name="bap_penggeledahan"
                    {{ $takah->mindik->bap_penggeledahan === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">BAP Penggeledahan</label>
            </div>
            {{--Sprin Penyitaan--}}
            <div class="form-group form-check">
                <input type="checkbox"
                       class="form-check-input"
                       name="sprin_penyitaan"
                    {{ $takah->mindik->sprin_penyitaan === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">Sprin Penyitaan</label>
            </div>
            {{--BAP Penyitaan--}}
            <div class="form-group form-check">
                <input type="checkbox"
                       class="form-check-input"
                       name="bap_penyitaan"
                    {{ $takah->mindik->bap_penyitaan === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">BAP Penyitaan</label>
            </div>
            {{--BAP Saksi--}}
            <div class="form-group form-check">
                <input type="checkbox"
                       class="form-check-input"
                       name="bap_saksi"
                    {{ $takah->mindik->bap_saksi === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">BAP Saksi</label>
            </div>
            {{--BAP Saksi/Tersangka--}}
            <div class="form-group form-check">
                <input type="checkbox"
                       class="form-check-input"
                       name="bap_tersangka"
                    {{ $takah->mindik->bap_tersangka === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">BAP Tersangka</label>
            </div>
            {{--Lapju--}}
            <div class="form-group form-check">
                <input type="checkbox"
                       class="form-check-input"
                       name="laporan_kemajuan"
                    {{ $takah->mindik->laporan_kemajuan === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">Laporan Kemajuan</label>
            </div>
        </div>
    </div>

    {{--Mindik Tambahan--}}
    @if (!empty($takah->mindiktambahan)){{--kalau array $results gak kosong--}}
    @foreach ($takah->mindiktambahan as $index => $result){{--loop data--}}
    <div class="form-group row mb-3">
        <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan {{ $index+1 }}</label>
        <div class="col-lg-10">
            <input type="text"
                   id="mindiktambahan{{ $index }}"
                   name="mindiktambahan{{ $index }}"
                   class="form-control"
                   value="{{ $result->nama }}">
            <small id="helper-mindiktambahan{{ $index }}" class="form-text text-danger"></small>
        </div>
    </div>
    @endforeach
    @endif

    {{--Submit--}}
    <div class="d-flex justify-content-end mb-3">
        <button type="submit" class="btn btn-lims-gradient d-flex align-content-center">
            Simpan
            <i id="loader-update-jeniskasus-barangbukti-mindik"
               class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
               style="display: none">
            </i>
        </button>
    </div>

</form>

