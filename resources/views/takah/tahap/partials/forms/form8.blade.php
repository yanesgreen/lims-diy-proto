<div class="card">
    <div class="card-header bg-primary" id="headingFour">
        <h6 class="mb-0 text-white" id="collapseFour-text">
            8. Identitas Penyidik/Penerima
        </h6>
    </div>
    <div>
        <div id="form-simpan-penyidik-penerima-container" class="card-body">
            {{--form start--}}
            <form id="form-simpan-penyidik-penerima"
                  method="post"
                  action="{{ route('takah.process.simpan_penyidik_penerima', $takah->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('put')

                {{--Tgl Penyerahan--}}
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label text-lg-right">
                        Tgl. Penyerahan
                    </label>
                    <div class="col-lg-2">
                        <input type="date"
                               name="tgl_penyerahan"
                               class="form-control">
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
                                <span class="input-group-text btn-primary" id="clear_identitas"
                                      style="display: none">
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
                        <button id="btn-gunakan-webcam" type="button" class="btn btn-primary">
                            <i class="fas fa-camera mr-2"></i>
                            Gunakan Webcam
                        </button>
                    </div>
                    <div id="foto-container-alt" class="col-lg-10"></div>
                </div>

                {{--foto--}}
                <div class="form-group row mb-3" id="container-gunakan-foto" style="display: none">
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
                        <div class="camera">
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

                {{--Submit--}}
                <div class="d-flex justify-content-end mb-3">
                    <button id="btn-8" class="btn btn-primary d-flex align-content-center">
                        Selanjutnya
                        <i id="loader-simpan-penyidik-penerima"
                           class="fas fa-circle-notch fa-spin ml-2 mt-1"
                           style="display: none">
                        </i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

