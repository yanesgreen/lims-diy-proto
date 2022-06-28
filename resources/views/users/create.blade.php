@extends('layouts.backend.default')

@section('content')
    {{--Judul halaman--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Form Tambah Pengguna</h4>
    </div>

    {{--Row 1--}}
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-sm" style="background: whitesmoke">
                {{--Card Body--}}
                <div class="card-body">
                    {{--form start--}}
                    <form method="post" action="{{ route('pengguna.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{--Nama Lengkap--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Nama Lengkap</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       name="nama"
                                       class="form-control"
                                       value="{{ old('nama') }}">
                                <small class="form-text text-danger">{{ $errors->first('nama') }}</small>
                            </div>
                        </div>

                        {{--Username--}}
                        <div class="form-group row bg-form-stripped">
                            <label class="col-lg-2 col-form-label text-lg-right">Username</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       name="username"
                                       class="form-control"
                                       value="{{ old('username') }}">
                                <small
                                    class="form-text {{ $errors->first('username') ? 'text-danger' : 'text-muted'}}">
                                    {{ $errors->first('username') ? $errors->first('username') : 'nb: username harus berupa huruf, angka atau gabungan huruf dan angka tanpa spasi' }}
                                </small>
                            </div>
                        </div>

                        {{--Pangkat--}}
                        <div class="form-group row">
                            <label for="selectPangkat" class="col-lg-2 col-form-label text-lg-right">
                                Pangkat
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2" id="selectPangkat" name="pangkat_id">
                                    <option value="" disabled selected>Pilih Pangkat</option>
                                    @foreach ($pangkat as $index => $item)
                                        @if(old('pangkat_id') === $index )
                                            <option value="{{$index}}" selected>{{ $item }}</option>
                                        @else
                                            <option value="{{$index}}">{{ $item }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{{ $errors->first('pangkat_id') }}</small>
                            </div>
                        </div>

                        {{--NRP--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">NRP/NIP</label>
                            <div class="col-lg-10">
                                <input type="text"
                                       name="nrp"
                                       class="form-control"
                                       value="{{ old('nrp') }}">
                                <small class="form-text text-danger">{{ $errors->first('nrp') }}</small>
                            </div>
                        </div>

                        {{--Jabatan--}}
                        <div class="form-group row">
                            <label for="selectJabatan" class="col-lg-2 col-form-label text-lg-right">
                                Jabatan
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2" id="selectJabatan" name="jabatan_id">
                                    <option value="" disabled selected>Pilih Jabatan</option>
                                    @foreach ($jabatan as $index => $item)
                                        @if(old('jabatan_id') === $index )
                                            <option value="{{$index}}" selected>{{ $item }}</option>
                                        @else
                                            <option value="{{$index}}">{{ $item }}</option>
                                        @endif
                                    @endforeach

                                </select>
                                <small class="form-text text-danger">{{ $errors->first('jabatan_id') }}</small>
                            </div>
                        </div>

                        {{--Password--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Password</label>
                            <div class="col-lg-10">
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       onpaste="return false;">
                                <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                            </div>
                        </div>

                        {{--Konfirmasi Password--}}
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-lg-right">Konfirmasi Password</label>
                            <div class="col-lg-10">
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       onpaste="return false;">
                                <small
                                    class="form-text text-danger">{{ $errors->first('password_confirmation') }}
                                </small>
                            </div>
                        </div>

                        {{--Akses--}}
                        <div class="form-group row">
                            <label for="selectRole" class="col-lg-2 col-form-label text-lg-right">
                                Akses
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2" id="selectRole" name="role_id">
                                    <option value="" disabled selected>Pilih Role</option>
                                    @foreach ($roles as $index => $role)
                                        @if(old('role_id') === $index )
                                            <option value="{{$index}}" selected>{{ $role }}</option>
                                        @else
                                            <option value="{{$index}}">{{ $role }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{{ $errors->first('role_id') }}</small>
                            </div>
                        </div>

                        {{--Bidang--}}
                        <div class="form-group row">
                            <label for="selectBidang" class="col-lg-2 col-form-label text-lg-right">
                                Bidang
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2" id="bidang_id" name="bidang_id">
                                    <option value="" disabled selected>Pilih Bidang</option>
                                    @foreach ($bidang as $index => $item)
                                        @if(old('bidang_id') === $index )
                                            <option value="{{$index}}" selected>{{ $item }}</option>
                                        @else
                                            <option value="{{$index}}">{{ $item }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">
                                    {{ $errors->first('bidang_id') }}
                                </small>
                            </div>
                        </div>

                        {{--SubBidang--}}
                        <div class="form-group row">
                            <label for="selectBidang" class="col-lg-2 col-form-label text-lg-right">
                                Sub Bidang
                            </label>
                            <div class="col-lg-10">
                                <select class="form-control select2" id="subbidang_id" name="subbidang_id">
                                    <option value="" disabled selected>Pilih Sub Bidang</option>
                                    \
                                </select>
                                <small class="form-text text-danger">
                                    {{ $errors->first('subbidang_id') }}
                                </small>
                            </div>
                        </div>

                        {{--foto--}}
                        <div class="form-group row mb-0">
                            <label class="col-lg-2 col-form-label text-lg-right">Foto Pengguna</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            Pilih Foto
                                            <input name="foto" type="file" id="imgInp" accept=".png, .jpg, .jpeg">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <small class="form-text {{ $errors->first('foto') ? 'text-danger' : 'text-muted'}}">
                                    {{ $errors->first('foto') ? $errors->first('foto') : 'nb: ukuran foto max. 512KB. ( direkomendasikan untuk menggunakan foto berbentuk persegi. )' }}
                                </small>
                                <img id='img-upload'/>
                            </div>
                        </div>

                        {{--Tanda Tangan--}}
                        {{--input ttd--}}
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
                                <img class="bg-light" src='' id='sign_prev' style='display: none;'/>
                            </div>
                        </div>
                        {{--ttd to save--}}
                        <textarea id='output' name="digitalsign" class="d-none"></textarea>

                        {{--submit--}}
                        <div class="text-right mt-3 mb-3">
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
    <script src="{{ asset('js/jquery.chained.min.js') }}"></script>
    <script src="{{ asset('js/jquery.chained.remote.js') }}"></script>
    <script>
        $(function () {
            //submit onclick
            $('#submit').on('click', function () {
                if ($('#output').val() === '') {
                    $('#digitalSignHelper').text('bagian ini harus diisi');
                }
            });
            // submit onclick end

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
            // j signature end

            // select2
            $('.select2').select2();
            // select2 end

            // input:image
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
            // input:image end


            // chained select
            $("#subbidang_id").remoteChained({
                parents: "#bidang_id",
                url: "../../masterdata/subbidang/api/select/create"
            });

        });
    </script>
@endsection
