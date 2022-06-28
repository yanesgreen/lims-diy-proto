<form id="form-update-penyidik-detailpermintaan-asaltakah"
      method="post"
      action="{{ route("takah.update.penyidik_permintaan_asal", $takah->id) }}">
    @csrf
    @method('put')

    {{--Id Penyidik--}}
    <div class="form-group row d-none">
        <label class="col-lg-2 col-form-label text-lg-right">
            ID Penyidik
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="penyidik_id"
                   id="penyidik_id"
                   class="form-control"
                   value="{{ $takah->penyidik_id }}"
                   readonly>
        </div>
    </div>

    {{--Jenis Identitas--}}
    <div class="form-group row">
        <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
            Jenis Identitas
        </label>
        <div class="col-lg-10">
            <select class="form-control select2"
                    id="jenis_identitas"
                    name="jenisidentitas_id"
                    style="width: 100%">
                @if (!empty($jenisidentitas))
                    @foreach ($jenisidentitas as $index => $item)
                        <option
                            value="{{ $index }}" {{ $jenisidentitas }} {{ ($takah->penyidik->jenisidentitas_id == $index) ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                @endif
            </select>
            <small id="helper-jenisidentitas_id" class="form-text text-danger"></small>
        </div>
    </div>

    {{--No Identitas dan Pangkat--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            No. Identitas
        </label>
        <div class="col-lg-4">
            <input type="number"
                   class="form-control"
                   name="no_identitas"
                   id="no_identitas"
                   value="{{ $takah->penyidik->no_identitas }}">
            <small id="helper-no_identitas" class="form-text text-danger"></small>
        </div>
        <label class="col-lg-2 col-form-label text-lg-right">
            Pangkat
        </label>
        <div class="col-lg-4">
            @if ($takah->penyidik->pangkat_id)
                <select class="form-control select2" id="pangkat" name="pangkat_id" style="width: 100%">
                    @if (!empty($pangkat))
                        @foreach ($pangkat as $index => $item)
                            @if ($takah->penyidik->pangkat_id)
                                <option
                                    value="{{ $index }}" {{ ($takah->penyidik->pangkat_id === $index ? 'selected' : '') }}>
                                    {{ $item }}
                                </option>
                            @else
                                <option value=""></option>
                                <option value="{{ $index }}">
                                    {{ $item }}
                                </option>
                            @endif

                        @endforeach
                    @endif
                </select>
            @else
                <select class="form-control select2"
                        id="pangkat"
                        name="pangkat_id"
                        style="width: 100%"
                        disabled>
                </select>
            @endif
            <small id="helper-pangkat_id" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Pengirim/Penyidik--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            Nama Penyidik/Pengirim
        </label>
        <div class="col-lg-10">
            <input type="text"
                   class="form-control"
                   id="nama"
                   name="nama"
                   value="{{ $takah->penyidik->nama }}">
            <small id="helper-nama" class="form-text text-danger"></small>
        </div>
    </div>

    {{--No HP/Telp--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            No. HP/Telp
        </label>
        <div class="col-lg-10">
            <input value="{{ $takah->penyidik->telepon }}"
                   type="text"
                   name="telepon"
                   id="telepon"
                   class="form-control"
                   minlength="5" maxlength="20">
            <small id="helper-telepon" class="form-text text-danger"></small>
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
                   value="{{ $takah->detailpermintaan_id }}"
                   readonly>
        </div>
    </div>

    {{--No Surat Permintaan--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            No. Surat Permintaan
        </label>
        <div class="col-lg-10">
            <input value="{{ $takah->detailpermintaan->no_surat }}"
                   type="text"
                   name="no_surat"
                   class="form-control">
            <small id="helper-no_surat" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Tgl Permintaan--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            Tgl. Surat Permintaan
        </label>
        <div class="col-lg-2">
            <input type="date"
                   name="tgl_surat"
                   class="form-control"
                   value="{{ \Carbon\Carbon::parse($takah->detailpermintaan->tgl_surat)->format('Y-m-d') }}">
            <small id="helper-tgl_surat" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Asal Permintaan--}}
    {{--    <div class="form-group row">--}}
    {{--        <label class="col-lg-2 col-form-label text-lg-right">--}}
    {{--            Asal Permintaan--}}
    {{--        </label>--}}
    {{--        <div class="col-lg-10">--}}
    {{--            <select class="form-control select2"--}}
    {{--                    id="asal-permintaan"--}}
    {{--                    name="instansi"--}}
    {{--                    style="width: 100%"--}}
    {{--            >--}}
    {{--                <option value="polri" {{ ($takah->asaltakah->instansi === "polri") ? 'selected' : '' }}>POLRI</option>--}}
    {{--                <option value="nonpolri" {{ ($takah->asaltakah->instansi === "nonpolri") ? 'selected' : '' }}>Non--}}
    {{--                    POLRI--}}
    {{--                </option>--}}
    {{--            </select>--}}
    {{--            <small id="helper-instansi" class="form-text text-danger"></small>--}}
    {{--        </div>--}}
    {{--    </div>--}}

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
                   value="{{ $takah->asaltakah_id }}"
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

        {{--Mabes--}}
        {{--        <div class="form-group row">--}}
        {{--            <label for="polda" class="col-lg-2 col-form-label text-lg-right">--}}
        {{--                Mabes POLRI/Satwil--}}
        {{--            </label>--}}
        {{--            <div class="col-lg-10">--}}
        {{--                <select class="form-control select2 asal-wilayah"--}}
        {{--                        id="mabes_nonmabes"--}}
        {{--                        name="mabes_nonmabes"--}}
        {{--                        style="width: 100%"--}}
        {{--                >--}}
        {{--                    <option value="" disabled selected>Pilih Mabes POLRI/Satwil</option>--}}
        {{--                    <option value="mabes">Mabes</option>--}}
        {{--                    <option value="non-mabes">Satwil</option>--}}
        {{--                </select>--}}
        {{--                <small id="helper-mabes_nonmabes" class="form-text text-danger"></small>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        @if ($takah->asaltakah->satker_id !== null)
            {{--Direktorat--}}
            <div class="form-group row">
                <label for="direktorat" class="col-lg-2 col-form-label text-lg-right">
                    Satker
                </label>
                <div class="col-lg-10">
                    <select class="form-control select2 asal-wilayah"
                            id="direktorat"
                            name="satker_id"
                            style="width: 100%">
                        <option class="" value="" disabled selected>Pilih Direktorat</option>
                        @if (!empty($satker))
                            @foreach ($satker as $index => $item)
                                <option
                                    value="{{ $index }}" {{ $takah->asaltakah->satker_id === $index ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        @endif
                    </select>
                    <small id="helper-satker_id" class="form-text text-danger"></small>
                </div>
            </div>
        @endif

        @if ($takah->asaltakah->satker_id === null)

            {{--Satwil--}}
            {{--Polda--}}
            <div class="form-group row">
                <label for="polda" class="col-lg-2 col-form-label text-lg-right">
                    Polda
                </label>
                <div class="col-lg-10">
                    <select class="form-control select2 asal-wilayah"
                            id="polda"
                            name="polda"
                            style="width: 100%"
                    >
                        <option value="" disabled selected>Pilih Polda</option>
                        @if (!empty($polda))
                            @foreach ($polda as $index => $item)
                                <option
                                    value="{{ $index }}" {{ $takah->asaltakah->polda_id === $index ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        @endif
                    </select>
                    <small id="helper-polda" class="form-text text-danger"></small>
                </div>
            </div>

            {{--Polres--}}
            <div class="form-group row">
                <label for="polres" class="col-lg-2 col-form-label text-lg-right">
                    Polres
                </label>
                <div class="col-lg-10">
                    <select class="form-control select2 asal-wilayah"
                            id="polres"
                            name="polres"
                            style="width: 100%"
                    >
                        <option value="" disabled selected>Pilih Polres</option>
                        @if (!empty($polres))
                            @foreach ($polres as $index => $item)
                                <option
                                    value="{{ $index }}" {{ $takah->asaltakah->polres_id === $index ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        @endif
                    </select>
                    <small id="helper-polres" class="form-text text-danger"></small>
                </div>
            </div>

            {{--Polsek--}}
            <div class="form-group row">
                <label for="polsek" class="col-lg-2 col-form-label text-lg-right">
                    Polsek
                </label>
                <div class="col-lg-10">
                    <select class="form-control select2 asal-wilayah"
                            id="polsek"
                            name="polsek"
                            style="width: 100%"
                    >
                        <option value="" disabled selected>Pilih Polsek</option>
                        @if (!empty($polsek))
                            @foreach ($polsek as $index => $item)
                                <option
                                    value="{{ $index }}" {{ $takah->asaltakah->polsek_id === $index ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        @endif
                    </select>
                    <small id="helper-polsek" class="form-text text-danger"></small>
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
                <select class="form-control select2 asal-wilayah"
                        id="lembaga"
                        name="lembaga_id"
                        style="width: 100%"
                >
                    <option value="" disabled selected>Pilih Lembaga</option>
                    @if (!empty($lembaga))
                        @foreach ($lembaga as $index => $item)
                            <option
                                value="{{ $index }}" {{ ($takah->asaltakah->lembaga_id === $index ? 'selected' :  '') }}>{{ $item }}</option>
                        @endforeach
                    @endif
                </select>
                <small id="helper-lembaga_id" class="form-text text-danger"></small>
            </div>
        </div>

        {{--Keterangan PPNS--}}
        <div id="keterangan_ppns_container" class="form-group row" style="display: none; transition: all 0.1s ease">
            <label class="col-lg-2 col-form-label text-lg-right">
                Keterangan PPNS
            </label>
            <div class="col-lg-10">
                <input type="text"
                       id="keterangan_ppns"
                       name="keterangan_ppns"
                       class="form-control"
                       value="{{ $takah->asaltakah->keterangan_ppns }}"
                       disabled>
                <small id="helper-keterangan_ppns" class="form-text text-danger"></small>
            </div>
        </div>
    @endif


    {{--Submit--}}
    <div class="d-flex justify-content-end mb-3">
        <button type="submit" class="btn btn-lims-gradient d-flex align-content-center">
            Simpan
            <i id="loader-update-penyidik-detailpermintaan-asaltakah"
               class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
               style="display: none">
            </i>
        </button>
    </div>

</form>

