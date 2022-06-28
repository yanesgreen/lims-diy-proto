<form id="form-update-keterangan-takah"
      method="post"
      action="{{ route('takah.update.keterangantakah', $takah->id) }}">
    @csrf
    @method('PUT')

    {{--Kasus Menonjol--}}
    <div class="form-group row">
        <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
            Kasus Menonjol
        </label>
        <div class="col-lg-10">
            <select class="form-control select2"
                    id="kasus_menonjol"
                    name="kasus_menonjol"
                    style="width: 100%">
                <option value="1" {{ $takah->kasus_menonjol ? 'selected' : '' }}>
                    Ya
                </option>
                <option value="0" {{ !$takah->kasus_menonjol ? 'selected' : '' }}>
                    Tidak
                </option>
            </select>
            <small id="helper-kasus_menonjol" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Pemeriksaan TKP--}}
    <div class="form-group row">
        <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
            Pemeriksaan TKP
        </label>
        <div class="col-lg-10">
            <select class="form-control select2"
                    id="pemeriksaantkp"
                    name="pemeriksaantkp"
                    style="width: 100%">
                <option value="1" {{ $takah->pemeriksaan_tkp ? 'selected' : '' }}>
                    Ya
                </option>
                <option value="0" {{ !$takah->pemeriksaan_tkp ? 'selected' : '' }}>
                    Tidak
                </option>
            </select>
            <small id="helper-pemeriksaantkp" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Submit--}}
    <div class="d-flex justify-content-end mb-3">
        <button type="submit"
                class="btn btn-lims-gradient d-flex align-content-center ml-2">
            Simpan
            <i id="loader-update-keterangan-takah"
               class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
               style="display: none">
            </i>
        </button>
    </div>

</form>
