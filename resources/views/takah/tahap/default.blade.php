@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Tahap {{ angkaRomawi($takah->tahap) }}
        </h4>
        <button id="btn-back" class="btn btn-outline-primary" type="button">
            Kembali
        </button>
    </div>

    {{--forms--}}
    <div class="shadow mb-3">
        @include('takah.tahap.partials.details.form1')
        @include('takah.tahap.partials.details.form2')
        @include('takah.tahap.partials.details.form3')
        @if($takah->statustakah_id === 2 && auth()->user()->role->id === 3)
            @include('takah.tahap.partials.forms.form4')
        @endif
        @if($takah->statustakah_id > 2)
            @include('takah.tahap.partials.details.form4')
        @endif
        @if($takah->statustakah_id === 3 && auth()->user()->role->id === 3 )
            @include('takah.tahap.partials.forms.form5')
            @include('takah.tahap.partials.forms.form6')
        @endif
        @if($takah->statustakah_id > 3 )
            @include('takah.tahap.partials.details.form5')
            @include('takah.tahap.partials.details.form6')
        @endif
        @if($takah->statustakah_id === 4 && auth()->user()->role->id === 2 )
            @include('takah.tahap.partials.forms.form7')
        @endif
        @if($takah->statustakah_id > 4 )
            @include('takah.tahap.partials.details.form7')
        @endif
        @if($takah->statustakah_id === 5 && auth()->user()->role->id === 2 )
            @include('takah.tahap.partials.forms.form8')
            @include('takah.tahap.partials.forms.form9')
        @endif
    </div>
    {{--accordions form end--}}

    @if ($takah->statustakah_id === 1)
        <div class="d-sm-flex align-items-center justify-content-between mb-4 p-3 rounded shadow"
             style="background: whitesmoke">
            <p class="mb-0 text-gray-800">
                Kirim Takah ke Kaurmin?
            </p>
            <form id="form-serahkan-ke-kaurmin"
                  action="{{ route('takah.process.serahkan_ke_kaurmin', $takah->id) }}"
                  method="post">
                @csrf
                @method('put')
                <button type="submit"
                        class="btn btn-primary">
                    Ya, Kirim Takah
                    <i id="loader-serahkan-ke-kaurmin"
                       class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
                       style="display: none">
                    </i>
                </button>
            </form>
        </div>
    @endif
@endsection

@section('modals')
    @include('takah.tahap.partials.modals.default')
@endsection

@section('localscript')
    <script>
        $(function () {

            // select2
            $('.select2').select2();

            // select2 color
            $('.select2-container--default .select2-selection--single .select2-selection__rendered')
                .css({'color': '#222222', 'font-weight': 'normal'});

            // j signature
            const $sigdiv = $("#signature").jSignature();

            $('#reset').on('click', function () {
                $("#signature").jSignature('reset');
            });

            $('#click').click(function () {
                // Get response of type image
                const data = $sigdiv.jSignature('getData');

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

            // input file
            $('input[type="file"]').change(function (e) {
                const fileName = e.target.files[0].name
                $('.custom-file-label').html(fileName)
            });

            // input:image tiket masuk
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result).css({
                    "height": 100,
                    "width": "auto",
                    "margin-top": 4,
                    "margin-bottom": 16
                });
            };

            function readURL(input) {
                if (input.files && input.files[0]) {
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function () {
                readURL(this);
            });

            // block pangkat
            $('#jenis_identitas').on('change', function () {
                $('#pangkat').val(null).trigger('change');
                const val = $(this).val();
                console.log(val);
                if (val !== '3') {
                    $('#pangkat').attr({"disabled": true});
                } else {
                    $('#pangkat').attr({"disabled": false});
                }
            });

            // lengkap tidak lengkap
            $('#kelengkapan_formil').on('change', function () {
                const val = $(this).val();
                if (val === "lengkap") {
                    $('#keterangan_formil_tambahan').attr({"disabled": true}).val(null);
                } else {
                    $('#keterangan_formil_tambahan').attr({"disabled": false});
                }
            });

            //lengkap tidak lengkap
            $('#kelengkapan_teknis').on('change', function () {
                const val = $(this).val();
                if (val === "lengkap") {
                    $('#keterangan_teknis_tambahan').attr({"disabled": true}).val(null);
                } else {
                    $('#keterangan_teknis_tambahan').attr({"disabled": false});
                }
            });

            // tampilkan container upload bap
            $('#open-bap-container').on('click', function () {
                $('#bap-container').show();
                $('#pemeriksa-container').hide();
                $('#modal-tambah-pemeriksa').modal('hide');
            });

            // kelengkapan formil tambahan
            $('#btn-keterangan_formil_tambahan').on('click', function () {
                $('#text-keterangan_formil_tambahan').hide();
                $('#loader-keterangan_formil_tambahan').show();
            });

            // kelengkapan teknis tambahan
            $('#btn-keterangan_teknis_tambahan').on('click', function () {
                $('#text-keterangan_teknis_tambahan').hide();
                $('#loader-keterangan_teknis_tambahan').show();
            });

            //---------------
            // cari identitas
            //--------------
            $('#cari_identitas').on('click', function () {
                const no_identitas = $('#no_identitas').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('penyidik.search') }}",
                    method: "POST",
                    data: {"no_identitas": no_identitas},
                    beforeSend: function () {
                        $('#icon-cari-identitas').hide();
                        $('#loader-cari-identitas').css('display', 'inherit');
                    },
                    error: function (xhr) {
                        const response = xhr.responseJSON;
                        alert("Error:" + response)
                    },
                    success: function (response) {
                        if (response.penyidik) {
                            alert(response.message);
                            $('#cari_identitas').hide();
                            $('#clear_identitas').show();
                            $('#penyidik_id').val(response.penyidik.id).attr({"readonly": "readonly"});
                            $('#nama').val(response.penyidik.nama).attr({"readonly": "readonly"});
                            $('#telepon').val(response.penyidik.telepon).attr({"readonly": "readonly"});
                            $('#jenis_identitas').select2({disabled: true}).val(response.penyidik.jenisidentitas_id).trigger('change');
                            $('#pangkat').select2({disabled: true}).val(response.penyidik.pangkat_id).trigger('change');
                            $('#foto-choice').hide();
                            $('#foto-container').hide();
                            $('#foto-stream-container').css({'display': 'none'});
                            $('#foto-container-alt').show();
                            $('#digitalsign-container').removeClass('d-flex').addClass('d-none');
                            $('#digitalsign-container-alt').show();
                        } else {
                            alert(response.message);
                            $('#penyidik_id').val(null).attr({"readonly": false});
                            $('#nama').val(null).attr({"readonly": false});
                            $('#telepon').val(null).attr({"readonly": false});
                            $('#jenis_identitas').select2({disabled: false}).val(null).trigger('change');
                            $('#pangkat').select2({disabled: false}).val(null).trigger('change');
                            $('#foto-container').show();
                            $('#foto-stream-container').css({'display': 'flex'});
                            $('#foto-container-alt').hide();
                            $('#digitalsign-container').removeClass('d-none').addClass('d-flex');
                            $('#digitalsign-container-alt').hide();
                        }
                    },
                    complete: function () {
                        $('#icon-cari-identitas').show();
                        $('#loader-cari-identitas').css('display', 'none');
                    }
                });

                return false;
            });

            //-----------------
            // clear identitas
            //-----------------
            $('#clear_identitas').on('click', function () {
                $(this).hide();
                $('#cari_identitas').show();
                $('#no_identitas').val(null);
                $('#penyidik_id').val(null).attr({"readonly": false});
                $('#nama').val(null).attr({"readonly": false});
                $('#telepon').val(null).attr({"readonly": false});
                $('#jenis_identitas').select2({disabled: false}).val(null).trigger('change');
                $('#pangkat').select2({disabled: false}).val(null).trigger('change');
                $('#foto-choice').show();
                $('#foto-container').show();
                $('#foto-stream-container').css({'display': 'flex'});
                $('#foto-container-alt').hide();
                $('#digitalsign-container').removeClass('d-none').addClass('d-flex');
                $('#digitalsign-container-alt').hide();
            });

            //=================================
            // toggle file input foto penyidik
            //=================================
            $('#btn-gunakan-foto').on('click', function () {
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-lims-gradient');

                $('#container-gunakan-webcam').hide();
                $('#container-gunakan-foto').show();

                $('#imgInp').attr({'name': 'foto'});
                $('#foto').removeAttr('name');

                $('#photo').attr({'src': ''});
                $('#container-gunakan-foto').find('.text-danger').attr('id', 'helper-foto');
            });

            $('#btn-gunakan-webcam').on('click', function () {

                startup();
                $('#container-gunakan-foto').hide();
                $('#container-gunakan-webcam').show();

                $('#foto').attr({'name': 'foto'});
                $('#imgInp').removeAttr('name');

                $('#img-upload').attr({'src': ''});
                $('#container-gunakan-webcam').find('.text-danger').attr('id', 'helper-foto');
            });

            //==================
            // webcam penyidik
            //==================
            let width = 320;    // We will scale the photo width to this
            let height = 0;     // This will be computed based on the input stream
            let streaming = false;
            let video = null;
            let canvas = null;
            let photo = null;
            let foto = null;
            let startbutton = null;

            function startup() {
                video = document.getElementById('video');
                canvas = document.getElementById('canvas');
                photo = document.getElementById('photo');
                foto = document.getElementById('foto');
                startbutton = document.getElementById('startbutton');

                navigator.mediaDevices.getUserMedia({video: true, audio: false})
                    .then(function (stream) {
                        video.srcObject = stream;
                        video.play();
                    })
                    .catch(function (err) {
                        console.log("An error occurred: " + err);
                    });

                video.addEventListener('canplay', function (ev) {
                    if (!streaming) {
                        height = video.videoHeight / (video.videoWidth / width);

                        if (isNaN(height)) {
                            height = width / (4 / 3);
                        }

                        video.setAttribute('width', width);
                        video.setAttribute('height', height);
                        canvas.setAttribute('width', width);
                        canvas.setAttribute('height', height);
                        streaming = true;
                    }
                }, false);

                startbutton.addEventListener('click', function (ev) {
                    takepicture();
                    ev.preventDefault();
                }, false);

                clearphoto();
            }

            function clearphoto() {
                var context = canvas.getContext('2d');
                context.fillStyle = "#AAA";
                context.fillRect(0, 0, canvas.width, canvas.height);

                var data = canvas.toDataURL('image/png');
                photo.setAttribute('src', data);
            }

            function takepicture() {
                var context = canvas.getContext('2d');
                $('#photo-container').show();
                if (width && height) {
                    canvas.width = width;
                    canvas.height = height;
                    context.drawImage(video, 0, 0, width, height);

                    var data = canvas.toDataURL('image/png');
                    photo.setAttribute('src', data);
                    foto.value = data;
                } else {
                    clearphoto();
                }
            }

            // ===================================
            // toggle file input foto barangbukti
            // ===================================
            $('#btn-gunakan-foto-bb').on('click', function () {
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-lims-gradient');

                $('#container-gunakan-webcam-bb').hide();
                $('#container-gunakan-foto-bb').show();

                $('#imgInp2').attr({'name': 'foto_bb'});
                $('#foto-bb').removeAttr('name');

                $('#photo-bb').attr({'src': ''});
                $('#container-gunakan-foto-bb').find('.text-danger').attr('id', 'helper-foto_bb');
            });

            $('#btn-gunakan-webcam-bb').on('click', function () {

                startupbb();
                $('#container-gunakan-foto-bb').hide();
                $('#container-gunakan-webcam-bb').show();

                $('#foto-bb').attr({'name': 'foto_bb'});
                $('#imgInp2').removeAttr('name');

                $('#img-upload-2').attr({'src': ''});
                $('#container-gunakan-webcam-bb').find('.text-danger').attr('id', 'helper-foto_bb');
            });

        });
    </script>
@endsection

@section('localcss')
    <style>
        body {
            color: #222222;
        }

        .card-body {
            background: whitesmoke;
        }

        .form-control {
            color: #222222;
        }

        .select2-container--default .select2-selection--single:focus {
            outline: none;
        }

        .select2-search--dropdown .select2-search__field {
            border-radius: 5px;
        }

        .select2-search--dropdown .select2-search__field:focus {
            outline: none;
            border-radius: 5px;
        }

        strong.select2-results__group {
            text-transform: capitalize;
        }

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

        input[type='text']::placeholder {
            color: lightgrey;
        }

        input[type='text']:focus::placeholder {
            color: transparent;
        }

        #cari_identitas {
            cursor: pointer
        }

        #cari_identitas:active {
            background: orangered;
        }

        #clear_identitas {
            cursor: pointer
        }

        #clear_identitas:active {
            background: orangered;
        }

        @media only screen and (min-width: 992px) {
            .signature-container {
                width: 35%;
            }
        }

        /* foto stream */
        #video {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            width: 320px;
            height: 240px;
        }

        #photo {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            width: 320px;
            height: 240px;
        }

        #canvas {
            display: none;
        }

        .camera {
            width: 340px;
            display: inline-block;
        }

        .output {
            width: 340px;
            display: inline-block;
        }

        #startbutton {
            display: block;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            bottom: 3.5rem;
        }

        .contentarea {
            font-size: 16px;
            font-family: "Lucida Grande", "Arial", sans-serif;
            width: 760px;
        }

    </style>
@endsection

