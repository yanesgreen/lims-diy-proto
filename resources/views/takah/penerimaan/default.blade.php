@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Penerimaan Barang Bukti
        </h4>
    </div>

    {{--Accordion--}}
    <div class="accordion" id="accordionExample">

        {{--accordion 2--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingOne">
                <h6 class="mb-0 text-white">
                    1. Identitas Penyidik/Pengirim
                </h6>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    @include('takah.penerimaan.partials.forms.1')
                </div>
            </div>
        </div>

        {{--accordion 2--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingTwo">
                <h6 class="mb-0 text-white">
                    2. Kasus dan Barang Bukti
                </h6>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    @include('takah.penerimaan.partials.forms.2b')
                </div>
            </div>
        </div>

        {{--accordion 3--}}
        <div class="card">
            <div class="card-header bg-primary" id="headingThree">
                <h6 class="mb-0 text-white">
                    3. Takah
                </h6>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                 data-parent="#accordionExample">
                <div class="card-body">
                    @include('takah.penerimaan.partials.forms.3')
                </div>
            </div>
        </div>

    </div>

@endsection

@section('modals')
    <!-- Modal Simpan Takah-->
    <div class="modal fade" id="modal-simpan-takah" tabindex="-1" role="dialog" aria-labelledby="modal-simpan-takah"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <span id="modal-simpan-takah-icon" style="display: none">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                    <span id="modal-simpan-takah-icon-failed" style="display: none">
                        <i class="fas fa-times-circle fa-5x text-dark"></i>
                    </span>
                    <h5 id="modal-simpan-takah-title" class="mt-3 mb-0 font-weight-light text-muted"></h5>
                    <p id="modal-simpan-takah-text"></p>
                    <hr>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade"
         id="modal-simpan-takah-sukses"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-simpan-takah-sukses"
         data-backdrop="static"
         data-keyboard="false"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                   <span id="modal-simpan-takah-sukses-icon" style="display: none">
                        <i class="fas fa-check-circle fa-5x text-primary"></i>
                    </span>
                    <span id="modal-simpan-takah-sukses-icon-failed" style="display: none">
                        <i class="fas fa-times-circle fa-5x text-dark"></i>
                    </span>
                    <h5 id="modal-simpan-takah-sukses-title" class="mt-3 mb-0 font-weight-light text-muted"></h5>
                    <p id="modal-simpan-takah-sukses-text"></p>
                    <hr>
                    <button type="button"
                            id="modal-simpan-takah-sukses-btn-failed"
                            class="btn btn-primary"
                            data-dismiss="modal">
                        Tutup
                    </button>
                    <a role="button"
                       id="modal-simpan-takah-sukses-btn-sukses"
                       href=""
                       class="btn btn-primary"
                       style="display: none">
                        Lihat Dokumen
                    </a>
                </div>
            </div>
        </div>
    </div>
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

        /* foto stream 2 */
        #video-bb {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            width: 320px;
            height: 240px;
        }

        #photo-bb {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            width: 320px;
            height: 240px;
        }

        #canvas-bb {
            display: none;
        }

        .camera-bb {
            width: 340px;
            display: inline-block;
        }

        .output-bb {
            width: 340px;
            display: inline-block;
        }

        #startbutton-bb {
            display: block;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            bottom: 3.5rem;
        }

        .contentarea-bb {
            font-size: 16px;
            font-family: "Lucida Grande", "Arial", sans-serif;
            width: 760px;
        }

    </style>
@endsection

@section('localscript')
    <script src="{{ asset('js/jquery.chained.min.js') }}"></script>
    <script src="{{ asset('js/jquery.chained.remote.js') }}"></script>
    <script src="{{ asset('js/webcam.min.js') }}"></script>
    <script defer>
        $(document).ready(function () {
            // submit onclick
            $('#btn-simpan-tiket').on('click', function () {
                if ($('#output').val() === '') {
                    $('#digitalSignHelper').text('bagian ini harus diisi');
                }
            });

            // select2
            $('.select2').select2();

            // select2 color
            $('.select2-container--default .select2-selection--single .select2-selection__rendered')
                .css({'color': '#222222', 'font-weight': 'normal'});

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

            // input:image penyidik
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result).css({
                    "height": 100,
                    "width": "auto",
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

            // input:image bb
            var reader2 = new FileReader();
            reader2.onload = function (e) {
                $('#img-upload-2').attr('src', e.target.result).css({
                    "height": 100,
                    "width": "auto",
                    "margin-top": 4,
                    "margin-bottom": 16
                });
            };

            function readURL2(input) {
                if (input.files && input.files[0]) {
                    reader2.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp2").change(function () {
                readURL2(this);
            });

            const noId = $('#no_identitas');
            noId.change(function () {
                if ($('#no_identitas').val().length > 20) {
                    $('#no_identitas').val('');
                    $('#helper-no_identitas').text('No identitas tidak boleh lebih dari 20 digit');
                } else if ($('#no_identitas').val().length <= 20) {
                    $('#helper-no_identitas').text('');
                }
            });

            // chained select - polres
            $("#polres").remoteChained({
                parents: "#polda",
                url: "../../masterdata/polres/api/select"
            });

            // chained select - polsek
            $("#polsek").remoteChained({
                parents: "#polres",
                url: "../../masterdata/polsek/api/select"
            });

            // chained select - subbidang
            $("#subbidang_kode").remoteChained({
                parents: "#bidang_id",
                url: "../../masterdata/subbidang/api/select/takah"
            });

            // tgl penerimaan
            $('#tgl_penerimaan').on('change', function () {
                tglPenerimaan = $('#tgl_penerimaan').val();
                $('#created_at').val(tglPenerimaan);
            });

            // block pangkat
            $('#jenis_identitas').on('change', function () {
                $('#pangkat').val(null).trigger('change');
                const val = $(this).val();
                if (val !== '3') {
                    $('#pangkat').attr({"disabled": true});
                } else {
                    $('#pangkat').attr({"disabled": false});
                }
            });

            //cek asal permintaan
            $('#asal-permintaan').on('change', function () {
                const val = $(this).val();
                if (val === "nonpolri") {
                    $('#polda').attr({"disabled": true}).val('').trigger('change');
                    $('#polres').attr({"disabled": true});
                    $('#polsek').attr({"disabled": true});
                    $('#mabes_nonmabes').attr({"disabled": true}).val('').trigger('change');
                    $('#direktorat').attr({"disabled": true}).val('');
                    $('#lembaga').attr({"disabled": false}).val('');
                } else {
                    $('#polda').attr({"disabled": false});
                    $('#polres').attr({"disabled": false});
                    $('#polsek').attr({"disabled": false});
                    $('#mabes_nonmabes').attr({"disabled": false});
                    $('#mabes_nonmabes').attr({"disabled": false});
                    $('#direktorat').attr({"disabled": false});
                    $('#lembaga').attr({"disabled": true});
                    $('#mabes').attr({"disabled": true});
                    $('#lembaga').attr({"disabled": true}).val('').trigger('change');
                }
            });

            $('#mabes_nonmabes').on('change', function () {
                const val = $(this).val();
                $('#direktorat').val(null).trigger('change');
                if (val === "non-mabes") {
                    $('#polda').attr({"disabled": true}).val('').trigger('change');
                    $('#direktorat').attr({"disabled": true});
                    $('#polda').attr({"disabled": false});
                    $('#polres').attr({"disabled": false});
                    $('#polsek').attr({"disabled": false});
                } else if (val === "mabes") {
                    $('#polda').attr({"disabled": true}).val('').trigger('change');
                    $('#direktorat').attr({"disabled": false});
                    $('#polda').attr({"disabled": true});
                    $('#polres').attr({"disabled": true});
                    $('#polsek').attr({"disabled": true});
                }
            });

            // polres clear button
            $('#polres').on('change', function () {
                $('#btn-back-1-a').hide();
                $('#btn-back-1-b').show();
            });

            // polsek clear button
            $('#polsek').on('change', function () {
                $('#btn-back-2-a').hide();
                $('#btn-back-2-b').show();
            });

            // clear polres
            $('#btn-back-1-b').on('click', function () {
                $('#polres').attr({"disabled": false});
                $('#polres').val('').trigger('change');
            });

            // clear polsek
            $('#btn-back-2-b').on('click', function () {
                $('#polsek').attr({"disabled": false});
                $('#polsek').val('').trigger('change');
            });

            $('#kasus').on('change', function () {
                const val = $(this).val();
                if (val === "lain-lain") {
                    $('#keterangan-container').show();
                }
            });

            // keterangan ppns
            $('#lembaga').on('change', function () {
                const val = $(this).val();
                if (val === '6') {
                    $('#keterangan_ppns_container').show();
                    $('#keterangan_ppns').attr({"disabled": false});
                } else {
                    $('#keterangan_ppns_container').hide();
                    $('#keterangan_ppns').attr({"disabled": true});
                }
            });

            // bb
            $('#simpan-bb').on('click', function (event) {
                event.preventDefault();
                $('#tambah-bb').removeClass('d-none');
                $('#btn3').removeClass('d-none');
                $('#bb-data').removeClass('d-none');
                $(this).removeClass('d-flex');
                $(this).addClass('d-none');
            });

            //tersangka1
            $('#switch-tersangka1-b').on('click', function () {
                $('#tersangka1').attr({"disabled": true}).val('');
                $('#tersangka2').attr({"disabled": true}).val('');
                $('#tersangka3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-tersangka1-a').show();
                $('#switch-tersangka2-b').hide();
                $('#switch-tersangka3-b').hide();
            });

            $('#switch-tersangka1-a').on('click', function () {
                $('#tersangka1').attr({"disabled": false});
                $('#tersangka2').attr({"disabled": false});
                $('#tersangka3').attr({"disabled": false});
                $(this).hide();
                $('#switch-tersangka1-b').show();
                $('#switch-tersangka2-b').show();
                $('#switch-tersangka3-b').show();
            });

            //tersangka2
            $('#switch-tersangka2-b').on('click', function () {
                $('#tersangka2').attr({"disabled": true}).val('');
                $('#tersangka3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-tersangka2-a').show();
                $('#switch-tersangka3-b').hide();
            });

            $('#switch-tersangka2-a').on('click', function () {
                $('#tersangka2').attr({"disabled": false});
                $('#tersangka3').attr({"disabled": false});
                $(this).hide();
                $('#switch-tersangka2-b').show();
                $('#switch-tersangka3-b').show();
            });

            //tersangka3
            $('#switch-tersangka3-b').on('click', function () {
                $('#tersangka3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-tersangka3-a').show();
            });

            $('#switch-tersangka3-a').on('click', function () {
                $('#tersangka3').attr({"disabled": false});
                $(this).hide();
                $('#switch-tersangka3-b').show();
            });

            //saksi1
            $('#switch-saksi1-b').on('click', function () {
                $('#saksi1').attr({"disabled": true}).val('');
                $('#saksi2').attr({"disabled": true}).val('');
                $('#saksi3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-saksi1-a').show();
                $('#switch-saksi2-b').hide();
                $('#switch-saksi3-b').hide();
            });

            $('#switch-saksi1-a').on('click', function () {
                $('#saksi1').attr({"disabled": false});
                $('#saksi2').attr({"disabled": false});
                $('#saksi3').attr({"disabled": false});
                $(this).hide();
                $('#switch-saksi1-b').show();
                $('#switch-saksi2-b').show();
                $('#switch-saksi3-b').show();
            });

            //saksi2
            $('#switch-saksi2-b').on('click', function () {
                $('#saksi2').attr({"disabled": true}).val('');
                $('#saksi3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-saksi2-a').show();
                $('#switch-saksi3-b').hide();
            });

            $('#switch-saksi2-a').on('click', function () {
                $('#saksi2').attr({"disabled": false});
                $('#saksi3').attr({"disabled": false});
                $(this).hide();
                $('#switch-saksi2-b').show();
                $('#switch-saksi3-b').show();
            });

            //saksi3
            $('#switch-saksi3-b').on('click', function () {
                $('#saksi3').attr({"disabled": true}).val('');
                $(this).hide();
                $('#switch-saksi3-a').show();
            });

            $('#switch-saksi3-a').on('click', function () {
                $('#saksi3').attr({"disabled": false});
                $(this).hide();
                $('#switch-saksi3-b').show();
            });

            // subbidang kode
            $('#subbidang_kode').on('change', function () {
                $('#notakah-subbidang_kode').text($(this).val())
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
                            $('#jenis_identitas').select2({disabled: true}).val(response.penyidik.jenisidentitas_id)
                                .trigger('change');
                            $('#pangkat').select2({disabled: true}).val(response.penyidik.pangkat_id)
                                .trigger('change');
                            $('#foto-choice').hide();
                            $('#foto-container').hide();
                            $('#foto-stream-container').css({'display': 'none'});
                            $('#camera').css({'display': 'none'});
                            $('#foto-container-alt').show();
                            $('#foto-db-container').show();
                            $('#foto-db').attr('src', '{{ asset('storage/') }}' + '/' + response.penyidik.foto);
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
                            $('#foto-db-container').css({'display': 'none'});
                            $('#foto-db').removeAttr('src');
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

            //----------------
            // clear identitas
            //----------------
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
                $('#foto-db-container').css({'display': 'none'});
                $('#foto-db').removeAttr('src');
                $('#digitalsign-container').removeClass('d-none').addClass('d-flex');
                $('#digitalsign-container-alt').hide();
            });

            //=================================
            // toggle file input foto penyidik
            //=================================
            $('#btn-gunakan-foto').on('click', function () {
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-primary');

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


            // ===================
            // clear barangbukti
            // ===================
            for (let i = 1; i <= 4; i++) {
                $(`#btn-clear-bb${i}`).on('click', () => {
                    $(`#jenisbb${i}`).val('').trigger('change')
                    $(`#jumlahbb${i}`).val('')
                    $(`#beratbb${i}`).val('')
                });
            }


            // ===================================
            // toggle file input foto barangbukti
            // ===================================
            $('#btn-gunakan-foto-bb').on('click', function () {
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-primary');

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

            //====================
            // webcam barangbukti
            //====================
            let widthbb = 320;    // We will scale the photo width to this
            let heightbb = 0;     // This will be computed based on the input stream
            let streamingbb = false;
            let videobb = null;
            let canvasbb = null;
            let photobb = null;
            let fotobb = null;
            let startbuttonbb = null;

            function startupbb() {
                videobb = document.getElementById('video-bb');
                canvasbb = document.getElementById('canvas-bb');
                photobb = document.getElementById('photo-bb');
                fotobb = document.getElementById('foto-bb');
                startbuttonbb = document.getElementById('startbutton-bb');

                navigator.mediaDevices.getUserMedia({video: true, audio: false})
                    .then(function (stream) {
                        videobb.srcObject = stream;
                        videobb.play();
                    })
                    .catch(function (err) {
                        console.log("An error occurred: " + err);
                    });

                videobb.addEventListener('canplay', function (ev) {
                    if (!streamingbb) {
                        heightbb = videobb.videoHeight / (videobb.videoWidth / widthbb);

                        if (isNaN(heightbb)) {
                            heightbb = widthbb / (4 / 3);
                        }

                        videobb.setAttribute('width', widthbb);
                        videobb.setAttribute('height', heightbb);
                        canvasbb.setAttribute('width', widthbb);
                        canvasbb.setAttribute('height', heightbb);
                        streamingbb = true;
                    }
                }, false);

                startbuttonbb.addEventListener('click', function (ev) {
                    takepicturebb();
                    ev.preventDefault();
                }, false);

                clearphotobb();
            }

            function clearphotobb() {
                var contextbb = canvasbb.getContext('2d');
                contextbb.fillStyle = "#AAA";
                contextbb.fillRect(0, 0, canvasbb.width, canvasbb.height);

                var databb = canvasbb.toDataURL('image/png');
                photobb.setAttribute('src', databb);
            }

            function takepicturebb() {
                var contextbb = canvasbb.getContext('2d');
                $('#photo-container-bb').show();
                if (widthbb && heightbb) {
                    canvasbb.width = widthbb;
                    canvasbb.height = heightbb;
                    contextbb.drawImage(videobb, 0, 0, widthbb, heightbb);

                    var databb = canvasbb.toDataURL('image/png');
                    photobb.setAttribute('src', databb);
                    fotobb.value = databb;
                } else {
                    clearphotobb();
                }
            }

        });
    </script>
@endsection

