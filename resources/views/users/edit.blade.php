@extends('layouts.backend.default')

@section('content')
    {{--Judul halaman--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-primary">Form Edit Pengguna</h4>
    </div>

    {{--Row 1--}}
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-sm" style="background: whitesmoke">
                {{--Card Body--}}
                <div class="card-body">
                    {{--form start--}}
                    <form method="post"
                          action="{{ route('pengguna.update', $user->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        {{--Nama Lengkap--}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-lg-right">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       name="nama"
                                       class="form-control"
                                       value="{{ old('nama') ? old('nama') : $user->nama }}"
                                       required>
                                <small class="form-text text-danger">
                                    {{ $errors->first('nama') }}
                                </small>
                            </div>
                        </div>

                        {{--Username--}}
                        <div class="form-group row bg-form-stripped">
                            <label class="col-sm-2 col-form-label text-lg-right">Username</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       name="username"
                                       class="form-control"
                                       value="{{ $user->username }}"
                                       required>
                                <small class="form-text text-danger">{{ $errors->first('username') }}</small>
                            </div>
                        </div>

                        {{--Pangkat--}}
                        <div class="form-group row">
                            <label for="selectBidang" class="col-sm-2 col-form-label text-lg-right">
                                Pangkat
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="selectPangkat" name="pangkat_id" required>
                                    <option value="" disabled selected>Pilih Pangkat</option>
                                    @foreach ($pangkat as $index => $item)
                                        <option
                                            value="{{$index}}" {{ ($user->pangkat_id == $index) ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{{ $errors->first('pangkat_id') }}</small>
                            </div>
                        </div>

                        {{--No NRP--}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-lg-right">NRP/NIP</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       name="nrp"
                                       class="form-control"
                                       value="{{ old('nrp') ? old('nrp') : $user->nrp }}"
                                       required>
                                <small class="form-text text-danger">{{ $errors->first('nrp') }}</small>
                            </div>
                        </div>

                        {{--Jabatan--}}
                        <div class="form-group row">
                            <label for="selectJabatan" class="col-sm-2 col-form-label text-lg-right">
                                Jabatan
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="selectJabatan" name="jabatan_id" required>
                                    <option value="" disabled selected>Pilih Jabatan</option>
                                    @foreach ($jabatan as $index => $item)
                                        <option
                                            value="{{$index}}" {{ ($user->jabatan_id == $index) ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{{ $errors->first('jabatan_id') }}</small>
                            </div>
                        </div>

                        {{--Role--}}
                        <div class="form-group row">
                            <label for="selectRole" class="col-sm-2 col-form-label text-lg-right">
                                Akses
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="selectRole" name="role_id" required>
                                    <option value="" disabled selected>Pilih Role</option>
                                    @foreach ($roles as $index => $role)
                                        <option value="{{$index}}" {{ ($user->role_id == $index) ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{{ $errors->first('role_id') }}</small>
                            </div>
                        </div>

                        {{--Bidang--}}
                        <div class="form-group row">
                            <label for="selectBidang" class="col-sm-2 col-form-label text-lg-right">
                                Bidang
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="selectBidang" name="bidang_id">
                                    <option value="" disabled selected>Pilih Bidang</option>
                                    @foreach ($bidang as $index => $item)
                                        <option value="{{$index}}" {{ ($user->bidang_id == $index) ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{{ $errors->first('bidang_id') }}</small>
                            </div>
                        </div>

                        {{--SubBidang--}}
                        <div class="form-group row">
                            <label for="selectBidang" class="col-sm-2 col-form-label text-lg-right">
                                Sub Bidang
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="selectSubbidang" name="subbidang_id">
                                    <option value="" disabled selected>Pilih Sub Bidang</option>
                                    @foreach ($subbidang as $index => $item)
                                        <option
                                            value="{{$index}}" {{ ($user->subbidang_id == $index) ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{{ $errors->first('subbidang_id') }}</small>
                            </div>
                        </div>

                        {{--file user--}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-lg-right">Foto Pengguna</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            Ganti Foto
                                            <input name="foto" type="file" id="imgInp" accept=".png, .jpg, .jpeg">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <small class="form-text text-danger">{{ $errors->first('foto') }}</small>
                                <img id='img-upload'
                                     src="{{ $user->foto ? asset('storage/avatars/' . $user->foto) : asset('images/picture_profile/default.svg') }}"
                                     style="height: 100px; width: auto;"
                                     class="mt-2"/>
                            </div>
                        </div>

                        {{--Tanda Tangan--}}
                        {{--input ttd--}}
                        <div id="digitalsign_new_container">
                            <div class="row">
                                <label for="selectJabatan" class="col-lg-2 col-form-label text-lg-right">
                                    Tanda Tangan
                                </label>
                                <div class="col-lg-10 text-center d-flex flex-column flex-lg-row">
                                    <div class="d-flex flex-column signature-container">
                                        <div id="signature" style="border: 1px solid #cbcccd;"></div>
                                        <small id="digitalSignHelper"
                                               class="form-text text-danger">{{ $errors->first('digitalsign') }}
                                        </small>
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

                            </div>
                            {{--preview ttd--}}
                            <div class="form-group row">
                                <label id="prev" class="col-lg-2 col-form-label text-lg-right"></label>
                                <div class="col-lg-10">
                                    <img class="bg-light"
                                         src="{{ $user->digitalsign ? asset('storage/'. $user->digitalsign) : '' }}"
                                         id='sign_prev'
                                         @if ($user->digitalsign)
                                         style='display: initial; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);margin-top: 8px;margin-bottom: 8px'
                                         @else
                                         style='display: none;'
                                        @endif
                                    />
                                </div>
                            </div>
                            {{--ttd to save--}}
                            <textarea id='output' name="digitalsign" class="d-none"></textarea>
                        </div>

                        {{--submit--}}
                        <div class="text-right mt-3">
                            <a class="btn btn-light" href="{{ route('pengguna.index') }}"
                               role="button">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('localcss')
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        .signature-container {
            width: 100%;
        }

        @media only screen and (min-width: 992px) {
            .signature-container {
                width: 35%;
            }
        }
    </style>
@endsection

@section('localscript')
    {{--    <script src="{{ asset('js/file_input.js') }}"></script>--}}
    <script>
        $(function () {
            // j signature
            var $sigdiv = $("#signature").jSignature();

            $('#reset').on('click', function () {
                $("#signature").jSignature('reset');
            });

            $('#click').click(function () {
                // Get response of type image
                var data = $sigdiv.jSignature('getData');

                // Storing in textarea
                $('#output').val(data);

                // Alter image source
                let preview = $('#sign_prev');
                $('#prev').text('Preview Tanda Tangan');
                preview.attr('src', "data:" + data).css({
                    "box-shadow": "0 .5rem 1rem rgba(0,0,0,.15)",
                    "margin-top": 8,
                    "margin-bottom": 8
                });
                preview.show();
            });

            // select2
            $('.select2').select2();

            // file input
            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result).css({
                            "height": 100,
                            "width": "auto",
                            "margin-top": 4,
                            "margin-bottom": 16
                        });
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function () {
                readURL(this);
            });
        })
    </script>
@endsection
