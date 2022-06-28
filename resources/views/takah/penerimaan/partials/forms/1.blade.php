<form id="form-simpan-takah-1"
      method="post"
      action="{{ route("takah.store.penyidik_permintaan_asal") }}"
      enctype="multipart/form-data">
    @csrf

    {{--Tgl Penerimaan--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            Tgl. Penerimaan
        </label>
        <div class="col-lg-4">
            <input type="date"
                   name="tgl_penerimaan"
                   id="tgl_penerimaan"
                   class="form-control">
            <small id="helper-tgl_penerimaan" class="form-text text-danger"></small>
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
                   id="penyidik_id"
                   class="form-control"
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
                <option value="" disabled selected>Pilih Jenis Identitas</option>
                @if (!empty($jenisidentitas))
                    @foreach ($jenisidentitas as $index => $item)
                        <option value="{{ $index }}">{{ $item }}</option>
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
            <div class="input-group">
                <input type="number" class="form-control" name="no_identitas" id="no_identitas">
                <div id="btn-cari" role="button" class="input-group-append">
                    <span class="input-group-text btn-primary" id="cari_identitas">
                        <i id="icon-cari-identitas" class="fas fa-search"></i>
                        <i id="loader-cari-identitas" class="fas fa-circle-notch fa-spin"
                           style="display: none"></i>
                    </span>
                    <span class="input-group-text btn-primary" id="clear_identitas" style="display: none">
                        <i id="icon-cari-identitas" class="fas fa-redo"></i>
                    </span>
                </div>
            </div>
            <small id="helper-no_identitas" class="form-text text-danger"></small>
        </div>
        <label class="col-lg-2 col-form-label text-lg-right">
            Pangkat
        </label>
        <div class="col-lg-4">
            <select class="form-control select2"
                    id="pangkat"
                    name="pangkat_id"
                    style="width: 100%">
                <option value="" disabled selected>Pilih Pangkat</option>
                @if (!empty($pangkat))
                    @foreach ($pangkat as $index => $item)
                        <option value="{{ $index }}">{{ $item }}</option>
                    @endforeach
                @endif
            </select>
            <small id="helper-pangkat_id" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Penerima/Penyidik--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            Nama Penyidik/Pengirim
        </label>
        <div class="col-lg-10">
            <input type="text" class="form-control" id="nama" name="nama">
            <small id="helper-nama" class="form-text text-danger"></small>
        </div>
    </div>

    {{--No HP/Telp--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            No. HP/Telp
        </label>
        <div class="col-lg-10">
            <input type="text"
                   name="telepon"
                   id="telepon"
                   class="form-control"
                   minlength="5" maxlength="20">
            <small id="helper-telepon" class="form-text text-danger"></small>
        </div>
    </div>

    {{-- Pilihan Foto --}}
    <div id="foto-choice" class="form-group row mb-3">
        <label class="col-lg-2 col-form-label text-lg-right">Foto Penyidik/Pengirim</label>
        <div class="col-lg-10">
            <button id="btn-gunakan-foto" type="button" class="btn btn-primary mr-2">
                <i class="fas fa-image mr-2"></i>
                Cari File Foto
            </button>
            <button id="btn-gunakan-webcam" type="button" class="btn btn-outline-primary">
                <i class="fas fa-camera mr-2"></i>
                Gunakan Webcam
            </button>
            <small id="helper-foto" class="form-text text-danger"></small>
        </div>
        <div id="foto-container-alt" class="col-lg-10"></div>
    </div>

    {{--foto--}}
    <div class="form-group row mb-3" id="container-gunakan-foto" style="display:none;">
        <label class="col-lg-2 col-form-label text-lg-right"></label>
        <div id="foto-container" class="col-lg-10">
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Pilih Foto
                        <input type="file"
                               id="imgInp"
                               name="foto"
                               accept=".png, .jpg, .jpeg">
                    </span>
                </span>
                <input type="text" class="form-control" readonly>
            </div>
            <small class="form-text text-danger">
                <span class="text-muted">nb: ukuran foto max.512KB dan berorientasi portrait</span>
            </small>
            <img id='img-upload'/>
        </div>
        <div id="foto-container-alt" class="col-lg-10"></div>
    </div>

    {{--  foto stream --}}
    <div class="form-group row mb-3" id="container-gunakan-webcam" style="display: none">
        <label class="col-lg-2 col-form-label text-lg-right"></label>
        <div class="col-lg-10 d-flex" id="foto-stream-container">
            <div class="camera" id="camera">
                <video id="video">Video stream not available.</video>
                <button id="startbutton"
                        class="btn btn-primary"
                        style="opacity: 0.5">
                    Ambil Foto
                </button>
            </div>
            <canvas id="canvas"></canvas>
            <small id="helper-foto" class="form-text text-danger"></small>
            <div class="output" id="photo-container" style="display: none">
                <img id="photo" alt="Screenshot webcam akan muncul disini.">
                <textarea id="foto" name="foto" class="d-none"></textarea>
            </div>
        </div>
    </div>

    {{--foto dari db--}}
    <div class="form-group row mb-3" id="foto-db-container" style="display:none;">
        <label class="col-lg-2 col-form-label text-lg-right">Foto Penyidik</label>
        <div class="col-lg-10">
            <img id="foto-db" src="" style="height:100px"/>
        </div>
    </div>

    {{--Tanda Tangan--}}
    {{--input ttd--}}
    <div class="row" id="digitalsign-container">
        <label for="selectJabatan" class="col-lg-2 col-form-label text-lg-right">
            Tanda Tangan
        </label>
        <div class="col-lg-10 text-center d-flex flex-column flex-lg-row">
            <div class="d-flex flex-column signature-container">
                <div id="signature" style="border: 1px solid #cbcccd;"></div>
                <small id="helper-digitalsign" class="form-text text-danger"></small>
            </div>
            <div style="width: 10px">

            </div>
            <div class="d-flex flex-column">
                <button id='click' type="button" class="btn btn-sm btn-primary mt-1 mb-1">
                    Simpan Tanda Tangan
                </button>
                <button id="reset" type="button" class="btn btn-sm btn-light mt-1 mb-1">
                    Bersihkan Tanda Tangan
                </button>
            </div>
        </div>
        <div id="digitalsign-container-alt" class="col-lg-10">-</div>
    </div>
    {{--preview ttd--}}
    <div class="form-group row">
        <label id="prev" class="col-lg-2 col-form-label text-lg-right"></label>
        <div class="col-lg-10">
            <img class="bg-light" src='' id='sign_prev' style='display: none;'/>
        </div>
    </div>
    {{--ttd to save--}}
    <textarea id='output' name="digitalsign" class="d-none"></textarea>

    {{--No Surat Permintaan--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            No. Surat Permintaan
        </label>
        <div class="col-lg-10">
            <input type="text"
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
        <div class="col-lg-4">
            <input type="date"
                   name="tgl_surat"
                   class="form-control"
                   value="">
            <small id="helper-tgl_surat" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Asal Permintaan--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right">
            Asal Permintaan
        </label>
        <div class="col-lg-10">
            <select class="form-control select2"
                    id="asal-permintaan"
                    name="instansi"
                    style="width: 100%"
            >
                <option value="" disabled selected>Pilih Asal Permintaan</option>
                <option value="polri">POLRI</option>
                <option value="nonpolri">Non POLRI</option>
            </select>
            <small id="helper-instansi" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Satuan Wilayah Peminta Label--}}
    <div class="form-group row">
        <label class="col-lg-2 col-form-label text-lg-right font-weight-bold">
            Satuan Wilayah Peminta
        </label>
        <div class="col-lg-10"></div>
    </div>

    {{--Mabes--}}
    <div class="form-group row">
        <label for="polda" class="col-lg-2 col-form-label text-lg-right">
            Mabes POLRI/Satwil
        </label>
        <div class="col-lg-10">
            <select class="form-control select2 asal-wilayah"
                    id="mabes_nonmabes"
                    name="mabes_nonmabes"
                    style="width: 100%"
            >
                <option value="" disabled selected>Pilih Mabes POLRI/Satwil</option>
                <option value="mabes">Mabes</option>
                <option value="non-mabes">Satwil</option>
            </select>
            <small id="helper-mabes_nonmabes" class="form-text text-danger"></small>
        </div>
    </div>

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
                        <option value="{{ $index }}">{{ $item }}</option>
                    @endforeach
                @endif
            </select>
            <small id="helper-satker_id" class="form-text text-danger"></small>
        </div>
    </div>

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
                        <option value="{{ $index }}">{{ $item }}</option>
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
        <div class="col-lg-9">
            <select class="form-control select2 asal-wilayah"
                    id="polres"
                    name="polres"
                    style="width: 100%"
            >
                <option value="" disabled selected>Pilih Polres</option>
            </select>
            <small id="helper-polres" class="form-text text-danger"></small>
        </div>
        <div class="col-lg-1">
            <button id="btn-back-1-a" type="button" class="btn btn-primary w-100">...</button>
            <button id="btn-back-1-b"
                    type="button"
                    class="btn btn-primary w-100"
                    style="display: none">
                Back
            </button>
        </div>
    </div>

    {{--Polsek--}}
    <div class="form-group row">
        <label for="polsek" class="col-lg-2 col-form-label text-lg-right">
            Polsek
        </label>
        <div class="col-lg-9">
            <select class="form-control select2 asal-wilayah"
                    id="polsek"
                    name="polsek"
                    style="width: 100%"
            >
                <option value="" disabled selected>Pilih Polsek</option>
            </select>
            <small id="helper-polsek" class="form-text text-danger"></small>
        </div>
        <div class="col-lg-1">
            <button id="btn-back-2-a" type="button" class="btn btn-primary w-100">...</button>
            <button id="btn-back-2-b"
                    type="button"
                    class="btn btn-primary w-100"
                    style="display: none">
                Back
            </button>
        </div>
    </div>

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
                        <option value="{{ $index }}">{{ $item }}</option>
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
                   disabled>
            <small id="helper-keterangan_ppns" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Submit--}}
    <div class="d-flex justify-content-end mb-3">
        <button type="submit" class="btn btn-primary d-flex align-content-center">
            Simpan
            <i id="loader-simpan-takah-1"
               class="fas fa-circle-notch fa-spin ml-2 mt-1 text-primary"
               style="display: none">
            </i>
        </button>
    </div>

</form>

