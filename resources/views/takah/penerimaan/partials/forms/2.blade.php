<form id="form-simpan-takah-2"
      method="post"
      action="{{ route('takah.store.jeniskasus_barangbukti_mindik') }}"
      enctype="multipart/form-data">
    @csrf

    {{--Jenis Kasus--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Jenis Kasus</label>
        <div class="col-lg-10">
            <select class="form-control select2"
                    id="jeniskasus"
                    name="jeniskasus"
                    style="width: 100%"
            >
                <option disabled selected value="">Pilih Jenis Kasus</option>
                @if (!empty($jeniskasus))
                    @foreach ($jeniskasus as $index => $item)
                        <option value="{{ $index }}">{{ $item }}</option>
                    @endforeach
                @endif
            </select>
            <small id="helper-jeniskasus" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Jenis Barang Bukti--}}
    <div class="form-group row">
        <label for="selectJabatan" class="col-lg-2 col-form-label text-lg-right">
            Jenis Barang Bukti
        </label>
        <div class="col-lg-10">
            <select class="form-control select2"
                    id="selectBB"
                    name="jenisbb_id"
                    style="width: 100%">
                <option value="" disabled selected>Pilih Jenis Barang Bukti</option>
                @if (!empty($bidang))
                    @foreach ($bidang as $indexBidang => $bdng)
                        <optgroup label="{{ $bdng }}">
                            @if (!empty($jenisbb))
                                @foreach ($jenisbb as $indexJenisbb => $jnsbb)
                                    @if ($jnsbb->bidang_id == $indexBidang)
                                        <option value="{{ $jnsbb->id }}">{{ $jnsbb->nama }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </optgroup>
                    @endforeach
                @endif
            </select>
            <small id="helper-jenisbb_id" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Deskripsi--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Keterangan/Deskripsi</label>
        <div class="col-lg-10">
            <input type="text"
                   id="deskripsi"
                   name="deskripsi"
                   class="form-control">
            <small id="helper-deskripsi" class="form-text text-danger">
                <span class="text-muted">misal: Merk: Samsung, No. IMEI: 888888, dll</span>
            </small>
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
                   minlength="3">
            <small id="helper-dibuka-oleh" class="form-text text-danger">
                <span class="text-muted"></span>
            </small>
        </div>
    </div>

    {{--Jumlah Barang Bukti--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Jumlah</label>
        <div class="col-lg-10">
            <input type="text"
                   id="jumlah"
                   name="jumlah"
                   class="form-control"
                   max="9999">
            <small id="helper-jumlah" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Berat--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Berat</label>
        <div class="col-lg-10">
            <div class="input-group">
                <input type="number"
                       step="any"
                       id="berat"
                       name="berat"
                       class="form-control">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">gram</span>
                </div>
            </div>
            <small id="helper-berat" class="form-text text-danger">
                <span class="text-muted">khusus Narkoba.</span>
            </small>
        </div>
    </div>

    {{-- Pilihan Foto BB--}}
    <div id="foto-choice-bb" class="form-group row mb-3">
        <label class="col-lg-2 col-form-label text-lg-right">Foto Barang Bukti</label>
        <div class="col-lg-10">
            <button id="btn-gunakan-foto-bb" type="button" class="btn btn-primary mr-2">
                <i class="fas fa-image mr-2"></i>
                Cari File Foto
            </button>
            <button id="btn-gunakan-webcam-bb" type="button" class="btn btn-outline-primary">
                <i class="fas fa-camera mr-2"></i>
                Gunakan Webcam
            </button>
            <small id="helper-foto_bb" class="form-text text-danger"></small>
        </div>
    </div>

    {{--foto BB--}}
    <div class="form-group row mb-3" id="container-gunakan-foto-bb" style="display: none">
        <label class="col-lg-2 col-form-label text-lg-right"></label>
        <div id="foto-container-bb" class="col-lg-10">
            <div class="input-group">
			<span class="input-group-btn">
				<span class="btn btn-primary btn-file">
					Pilih Foto
					<input type="file"
                           id="imgInp2"
                           name="foto_bb"
                           accept=".png, .jpg, .jpeg">
				</span>
			</span>
                <input type="text" class="form-control" readonly>
            </div>
            <small class="form-text text-danger">
                <span class="text-muted">nb: ukuran foto max.512KB</span>
            </small>
            <img id='img-upload-2'/>
        </div>
        <div id="foto-container-alt-bb" class="col-lg-10"></div>
    </div>

    {{--foto stream bb--}}
    <div class="form-group row mb-3" id="container-gunakan-webcam-bb" style="display: none">
        <label class="col-lg-2 col-form-label text-lg-right"></label>
        <div class="col-lg-10 d-flex" id="foto-stream-container-bb">
            <div class="camera-bb" id="camera">
                <video id="video-bb">Video stream not available.</video>
                <button id="startbutton-bb"
                        class="btn btn-lims-gradient"
                        style="opacity: 0.5">
                    Ambil Foto
                </button>
            </div>
            <canvas id="canvas-bb"></canvas>
            <small id="helper-foto-bb" class="form-text text-danger"></small>
            <div class="output-bb" id="photo-container-bb" style="display: none">
                <img id="photo-bb" alt="Screenshot webcam akan muncul disini.">
                <textarea id="foto-bb" name="foto-bb" class="d-none"></textarea>
            </div>
        </div>
    </div>

    {{--Tersangka 1--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Tersangka 1</label>
        <div class="col-lg-9">
            <input type="text"
                   id="tersangka1"
                   name="tersangka1"
                   class="form-control">
            <small id="helper-tersangka1" class="form-text text-danger"></small>
        </div>
        <div class="col-lg-1">
            <button id="switch-tersangka1-a"
                    type="button"
                    class="btn btn-lims-gradient w-100"
                    style="display: none">
                <span style="font-size: 0.7rem">Ada</span>
            </button>
            <button id="switch-tersangka1-b"
                    type="button"
                    class="btn btn-primary w-100">
                <span style="font-size: 0.7rem">Tidak Ada</span>
            </button>
        </div>
    </div>

    {{--Tersangka 2--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Tersangka 2</label>
        <div class="col-lg-9">
            <input type="text"
                   id="tersangka2"
                   name="tersangka2"
                   class="form-control">
            <small id="helper-tersangka2" class="form-text text-danger"></small>
        </div>
        <div class="col-lg-1">
            <button id="switch-tersangka2-a"
                    type="button"
                    class="btn btn-lims-gradient w-100"
                    style="display: none">
                <span style="font-size: 0.7rem">Ada</span>
            </button>
            <button id="switch-tersangka2-b"
                    type="button"
                    class="btn btn-primary w-100">
                <span style="font-size: 0.7rem">Tidak Ada</span>
            </button>
        </div>
    </div>

    {{--Tersangka 3--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Tersangka 3</label>
        <div class="col-lg-9">
            <input type="text"
                   id="tersangka3"
                   name="tersangka3"
                   class="form-control"
            >
            <small id="helper-tersangka3" class="form-text text-danger"></small>
        </div>
        <div class="col-lg-1">
            <button id="switch-tersangka3-a"
                    type="button"
                    class="btn btn-lims-gradient w-100"
                    style="display: none">
                <span style="font-size: 0.7rem">Ada</span>
            </button>
            <button id="switch-tersangka3-b"
                    type="button"
                    class="btn btn-primary w-100">
                <span style="font-size: 0.7rem">Tidak Ada</span>
            </button>
        </div>
    </div>

    {{--Saksi 1--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Saksi 1</label>
        <div class="col-lg-9">
            <input type="text"
                   id="saksi1"
                   name="saksi1"
                   class="form-control">
            <small id="helper-saksi1" class="form-text text-danger"></small>
        </div>
        <div class="col-lg-1">
            <button id="switch-saksi1-a"
                    type="button"
                    class="btn btn-lims-gradient w-100"
                    style="display: none">
                <span style="font-size: 0.7rem">Ada</span>
            </button>
            <button id="switch-saksi1-b"
                    type="button"
                    class="btn btn-primary w-100">
                <span style="font-size: 0.7rem">Tidak Ada</span>
            </button>
        </div>
    </div>

    {{--Saksi 2--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Saksi 2</label>
        <div class="col-lg-9">
            <input type="text"
                   id="saksi2"
                   name="saksi2"
                   class="form-control">
            <small id="helper-saksi2" class="form-text text-danger"></small>
        </div>
        <div class="col-lg-1">
            <button id="switch-saksi2-a"
                    type="button"
                    class="btn btn-lims-gradient w-100"
                    style="display: none">
                <span style="font-size: 0.7rem">Ada</span>
            </button>
            <button id="switch-saksi2-b"
                    type="button"
                    class="btn btn-primary w-100">
                <span style="font-size: 0.7rem">Tidak Ada</span>
            </button>
        </div>
    </div>

    {{--Saksi 3--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Saksi 3</label>
        <div class="col-lg-9">
            <input type="text"
                   id="saksi3"
                   name="saksi3"
                   class="form-control">
            <small id="helper-saksi3" class="form-text text-danger"></small>
        </div>
        <div class="col-lg-1">
            <button id="switch-saksi3-a"
                    type="button"
                    class="btn btn-lims-gradient w-100"
                    style="display: none">
                <span style="font-size: 0.7rem">ada</span>
            </button>
            <button id="switch-saksi3-b"
                    type="button"
                    class="btn btn-primary w-100">
                <span style="font-size: 0.7rem">Tidak Ada</span>
            </button>
        </div>
    </div>

    {{--Dokumen Kelengkapan Mindik--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Administrasi Penyidikan</label>
        <div class="col-lg-10 pt-2">
            {{--Laporan Polisi--}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="laporan_polisi">
                <label class="form-check-label" for="exampleCheck1">Laporan Polisi</label>
            </div>
            {{--Surat Permohonan--}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="surat_permohonan">
                <label class="form-check-label" for="exampleCheck1">Surat Permohonan</label>
            </div>
            {{--Sprin Penggeledahan--}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="sprin_penggeledahan">
                <label class="form-check-label" for="exampleCheck1">Sprin Penggeledahan</label>
            </div>
            {{--BAP Penggeledahan--}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="bap_penggeledahan">
                <label class="form-check-label" for="exampleCheck1">BAP Penggeledahan</label>
            </div>
            {{--Sprin Penyitaan--}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="sprin_penyitaan">
                <label class="form-check-label" for="exampleCheck1">Sprin Penyitaan</label>
            </div>
            {{--BAP Penyitaan--}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="bap_penyitaan">
                <label class="form-check-label" for="exampleCheck1">BAP Penyitaan</label>
            </div>
            {{--BAP Saksi--}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="bap_saksi">
                <label class="form-check-label" for="exampleCheck1">BAP Saksi</label>
            </div>
            {{--BAP Saksi/Tersangka--}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="bap_tersangka">
                <label class="form-check-label" for="exampleCheck1">BAP Tersangka</label>
            </div>
            {{--Lapju--}}
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="laporan_kemajuan">
                <label class="form-check-label" for="exampleCheck1">Laporan Kemajuan</label>
            </div>
        </div>
    </div>

    {{--Mindik Tambahan 1--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan 1</label>
        <div class="col-lg-10">
            <input type="text"
                   id="mindiktambahan1"
                   name="mindiktambahan1"
                   class="form-control"
            >
            <small id="helper-mindiktambahan1" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Mindik Tambahan 2--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan 2</label>
        <div class="col-lg-10">
            <input type="text"
                   id="mindiktambahan2"
                   name="mindiktambahan2"
                   class="form-control"
            >
            <small id="helper-mindiktambahan2" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Mindik Tambahan 3--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">Mindik Tambahan 3</label>
        <div class="col-lg-10">
            <input type="text"
                   id="mindiktambahan3"
                   name="mindiktambahan3"
                   class="form-control"
            >
            <small id="helper-mindiktambahan3" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Submit--}}
    <div class="d-flex justify-content-end mb-3">
        <button type="submit" class="btn btn-lims-gradient d-flex align-content-center">
            Simpan
            <i id="loader-simpan-takah-2"
               class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
               style="display: none">
            </i>
        </button>
    </div>

</form>

