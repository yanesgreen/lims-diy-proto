<form id="form-simpan-takah-3"
      class=" mb-0"
      method="post"
      action="{{ route('takah.store') }}">
    @csrf

    {{--Tgl Penerimaan--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Created_at
        </label>
        <div class="col-lg-10">
            <input type="date"
                   name="created_at"
                   id="created_at"
                   class="form-control"
                   value=""
                   readonly>
        </div>
    </div>

    {{--No Takah--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            No Takah
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="no_takah"
                   id="no_takah"
                   class="form-control"
                   value="{{ $no_takah }}"
                   readonly>
        </div>
    </div>

    {{--Id Penyidik--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            ID Penyidik
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="penyidik_id"
                   id="id_penyidik"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Id Detail Permintaan--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            ID Detail Permintaan
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="detailpermintaan_id"
                   id="detailpermintaan_id"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Id Asal Takah--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            ID Asal Takah
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="asaltakah_id"
                   id="asaltakah_id"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Id BB--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            ID Barang Bukti
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="barangbukti_id"
                   id="barangbukti_id"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Id Jenis Kasus--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            ID Jenis kasus
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="jeniskasus_id"
                   id="jeniskasus_id"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Tersangka 1--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Tersangka 1
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="suspect1"
                   id="suspect1"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Tersangka 2--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Tersangka 2
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="suspect2"
                   id="suspect2"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Tersangka 2--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Tersangka 3
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="suspect3"
                   id="suspect3"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Saksi 1--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Saksi 1
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="witness1"
                   id="witness1"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Saksi 2--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Saksi 2
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="witness2"
                   id="witness2"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Saksi 3--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Saksi 3
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="witness3"
                   id="witness3"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Id Mindik--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            ID Mindik
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="mindik_id"
                   id="mindik_id"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Mindik Tambahan 1--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Mindik Tambahan 1
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="mt1"
                   id="mt1"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Mindik Tambahan 2--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Mindik Tambahan 2
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="mt2"
                   id="mt2"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Mindik Tambahan 3--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Mindik Tambahan 3
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="mt3"
                   id="mt3"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Foto BB--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Foto BB
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="foto_barangbukti"
                   id="foto_barangbukti"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Dibuka Oleh--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            Dibuka Oleh
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="dibuka_oleh_v2"
                   id="dibuka_oleh_v2"
                   class="form-control"
                   readonly>
        </div>
    </div>

    {{--Bidang--}}
    <div class="form-group row">
        <label for="selectBidang" class="col-lg-2 col-form-label text-lg-right">
            Bidang
        </label>
        <div class="col-lg-10">
            <select style="width: 100%"
                    class="form-control select2 w-100"
                    id="bidang_id"
                    name="bidang_id">
                <option value="" disabled selected>Pilih Bidang</option>
                @foreach ($bidang as $index => $item)
                    @if(old('bidang_id') == $index )
                        <option value="{{$index}}" selected>{{ $item }}</option>
                    @else
                        <option value="{{$index}}">{{ $item }}</option>
                    @endif
                @endforeach
            </select>
            <small id="helper-bidang_id" class="form-text text-danger"></small>
        </div>
    </div>

    {{--SubBidang--}}
    <div class="form-group row">
        <label for="selectBidang" class="col-lg-2 col-form-label text-lg-right">
            Sub Bidang
        </label>
        <div class="col-lg-10">
            <select style="width: 100%"
                    class="form-control select2"
                    id="subbidang_kode"
                    name="subbidang_kode">
                <option value="" disabled selected>Pilih Sub Bidang</option>
            </select>
            <small id="helper-subbidang_kode" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Nomor Takah--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Nomor Takah</label>
        <div class="col-lg-10">
            <div class="form-control" readonly>
                <span>{{ $no_takah }}/</span>
                <span id="notakah-subbidang_kode">---</span>
                <span>/{{ \Carbon\Carbon::now()->year }}</span>
                <span>/{{ \App\UnitKerja::find(unitKerjaId())->singkatan }}</span>
            </div>
        </div>
    </div>

    {{--Submit--}}
    <div class="d-flex justify-content-end mb-3">
        <button type="submit" class="btn btn-primary d-flex align-content-center">
            Simpan
        </button>
    </div>

</form>

