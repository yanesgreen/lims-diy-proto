@extends("layouts.backend.default")

@section('content')
    {{--Page Heading--}}
    <div class="d-none d-md-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Detail Takah
        </h4>
        <a href="{{ route("dashboard") }}"
           role="button"
           class="btn btn-danger shadow-sm">
            Kembali
        </a>
    </div>

    {{--Detail Dokumen Row--}}
    <div class="row mb-4">
        <div class="col-12">
            <table class="table table-bordered bg-white shadow-sm" style="font-size: 80%">
                <tr>
                    <th class="bg-primary text-white" style="width: 20em">No. Penerimaan BB</th>
                    <td class="text-capitalize text-left">
                        0000004/15062020/PUS
                    </td>
                </tr>
                <tr>
                    <th class="bg-primary text-white" style="width: 20em">Tgl. Masuk BB</th>
                    <td class="text-capitalize text-left">
                        15 Juni 2020
                    </td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">No. Takah</th>
                    <td class="text-capitalize text-left">
                        000004/NNF/2020/PUS
                    </td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Status Takah</th>
                    <td class="text-capitalize text-left">
                        Diterima Urtu
                    </td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Pokok Persoalan</th>
                    <td class="text-capitalize text-left">
                        Pokok Persoalan A
                    </td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Anak Persoalan</th>
                    <td class="text-capitalize text-left">
                        Anak Persoalan A
                    </td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Cucu Persoalan</th>
                    <td class="text-capitalize text-left">
                        Cucu Persoalan A
                    </td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Tersangka 1</th>
                    <td class="text-capitalize text-left">
                        Tersangka 1
                    </td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Tersangka 2</th>
                    <td class="text-capitalize text-left">
                        Tersangka 2
                    </td>
                </tr>
            </table>
        </div>
    </div>

    {{--Tabs Row--}}
    <div class="row mb-5">
        <div class="col-sm-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active text-center" id="nav-barbuk-tab" data-toggle="tab"
                       href="#nav-barbuk"
                       role="tab"
                       aria-controls="nav-barbuk" aria-selected="true">
                        <i class="fas fa-briefcase"></i>
                        <small class="d-none d-md-block">Barang Bukti</small>
                    </a>
                    <a class="nav-item nav-link text-center" id="nav-metode-tab" data-toggle="tab"
                       href="#nav-methods" role="tab"
                       aria-controls="nav-logs" aria-selected="false">
                        <i class="fas fa-wrench"></i>
                        <small class="d-none d-md-block">Mindik</small>
                    </a>
                    <a class="nav-item nav-link text-center" id="nav-history-tab" data-toggle="tab"
                       href="#nav-history" role="tab"
                       aria-controls="nav-logs" aria-selected="false">
                        <i class="fas fa-history"></i>
                        <small class="d-none d-md-block">History</small>
                    </a>
                    <a class="nav-item nav-link text-center" id="nav-pengirim-tab" data-toggle="tab"
                       href="#nav-pengirim"
                       role="tab"
                       aria-controls="nav-pengirim" aria-selected="false">
                        <i class="fas fa-user-circle"></i>
                        <small class="d-none d-md-block">Penyidik</small>
                    </a>
                    <a class="nav-item nav-link text-center" id="nav-pemeriksa-tab" data-toggle="tab"
                       href="#nav-pemeriksa"
                       role="tab"
                       aria-controls="nav-pemeriksa" aria-selected="false">
                        <i class="fas fa-users-cog"></i>
                        <small class="d-none d-md-block">Pemeriksa</small>
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                {{--TAB BARANG BUKTI--}}
                <div class="tab-pane fade show active bg-white p-2 rounded"
                     style="border-bottom: 1px solid lightgrey; border-left: 1px solid lightgrey; border-right: 1px solid lightgrey;"
                     id="nav-barbuk" role="tabpanel" aria-labelledby="nav-profil-tab">
                    <table class="table table-bordered bg-light my-3" style="font-size: 80%">
                        <tr>
                            <th style="width: 15%">Jenis</th>
                            <td class="text-capitalize text-left">
                                Jenis BB 1
                            </td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td class="text-capitalize text-left">
                                Barang Bukti A
                            </td>
                        </tr>
                        <tr>
                            <th>Ciri- ciri</th>
                            <td class="text-capitalize text-left">
                                warna putih
                            </td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td class="text-capitalize text-left">
                                <img src="{{ asset("images/iphone7.jpg") }}"
                                     alt="foto bb"
                                     style="height: 100px; width: auto">
                            </td>
                        </tr>
                    </table>
                </div>

                {{--TAB Mindik--}}
                <div class="tab-pane fade bg-white p-2 rounded"
                     id="nav-methods"
                     style="border-bottom: 1px solid lightgrey; border-left: 1px solid lightgrey; border-right: 1px solid lightgrey;"
                     role="tabpanel" aria-labelledby="nav-methods-tab">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                Mindik A
                            </div>

                            <div>
                                <i style="font-size: 12px" class="fas fa-check fa-1x text-success"></i>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                Mindik B
                            </div>

                            <div>
                                <i style="font-size: 12px" class="fas fa-times fa-1x text-danger"></i>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                Mindik C
                            </div>

                            <div>
                                <i style="font-size: 12px" class="fas fa-check fa-1x text-success"></i>
                            </div>
                        </li>
                    </ul>
                </div>

                {{--TAB Rekam Jejak--}}
                <div class="tab-pane fade bg-white p-2 rounded" id="nav-history"
                     style="border-bottom: 1px solid lightgrey; border-left: 1px solid lightgrey; border-right: 1px solid lightgrey;"
                     role="tabpanel"
                     aria-labelledby="nav-logs-tab">
                    <div class="row">
                        <div class="col-12">
                            <ul class="timeline" style="font-size: 80%">
                                <li>
                                    <p class="text-primary mb-0">
                                        1 Januari 2020
                                    </p>
                                    <p>
                                        Penerimaan BB/Takah dibuat
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{--TAB Penyidik--}}
                <div class="tab-pane fade bg-white p-2 rounded" id="nav-pengirim"
                     style="border-bottom: 1px solid lightgrey; border-left: 1px solid lightgrey; border-right: 1px solid lightgrey;"
                     role="tabpanel" aria-labelledby="nav-contact-tab">
                    <table class="table table-bordered bg-light my-3" style="font-size: 80%">
                        <tr>
                            <th style="width: 15%">Nama Penyidik</th>
                            <td class="text-capitalize text-left">
                                Penyidik A
                            </td>
                        </tr>
                        <tr>
                            <th>No. Telepon/Handphone</th>
                            <td class="text-capitalize text-left">
                                08989677
                            </td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td class="text-capitalize text-left">
                                <img src="{{ asset("storage/avatars/yanesgreen_1575432371.jpg") }}"
                                     alt="Foto"
                                     style="height: 100px; width: auto">
                            </td>
                        </tr>
                    </table>
                </div>

                {{--TAB Pemeriksa--}}
                <div class="tab-pane fade bg-white p-2 rounded" id="nav-pemeriksa"
                     style="border-bottom: 1px solid lightgrey; border-left: 1px solid lightgrey; border-right: 1px solid lightgrey;"
                     role="tabpanel" aria-labelledby="nav-contact-tab">
                    <ul class="list-group">
                        <li style="font-size: 12px"
                            class="list-group-item d-flex justify-content-between align-items-center">
                            Pemeriksa A
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    @if ( ( Request::get("status") == 1 && (Auth::user()->role->nama == "urtu") ))
        {{--Buttons--}}
        <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center text-primary">
                <p class="mb-0">
                    Serahkan takah ke Kaurmin, untuk memulai pemeriksaan.
                </p>
                <div class="d-flex">
                    <button class="btn btn-lims-gradient align-content-center ml-2"
                            data-toggle="modal" data-target="#modalsukses2">
                        Ya, serahkan
                        <i id="loader-bb"
                           class="fas fa-circle-notch fa-spin ml-2 mt-1"
                           style="display: none">
                        </i>
                    </button>
                </div>
            </div>
        </div>
    @endif
    @if ( ( Request::get("status") == 2 && (Auth::user()->role->nama == "kaurmin") ))
        {{--Buttons--}}
        <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center text-primary">
                <p class="mb-0">
                    Terima Takah dan mulai proses pemeriksaan?
                </p>
                <div class="d-flex">
                    <a href="{{ route('dummies.takah.edit') }}"
                       role="button"
                       class="btn btn-primary shadow-sm">
                        Edit Data Takah
                    </a>
                    <div id="form-setujui-susunan"
                         class="d-flex"
                         action=""
                         method="post">
                        <button class="btn btn-lims-gradient align-content-center ml-2"
                                data-toggle="modal" data-target="#modalsukses">
                            Mulai Proses
                            <i id="loader-bb"
                               class="fas fa-circle-notch fa-spin ml-2 mt-1"
                               style="display: none">
                            </i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ( ( Request::get("status") == 4 && (Auth::user()->role->nama == "kaurmin") ))
        {{--Buttons--}}
        <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center text-primary">
                <p class="mb-0">
                    Pemeriksaan telah selesai. Serahkan kembali takah ke Urtu?
                </p>
                <div class="d-flex">
                    <button class="btn btn-lims-gradient align-content-center ml-2"
                            data-toggle="modal" data-target="#modalsukses3">
                        Ya, serahkan
                        <i id="loader-bb"
                           class="fas fa-circle-notch fa-spin ml-2 mt-1"
                           style="display: none">
                        </i>
                    </button>
                </div>
            </div>
            @endif
            @if ( ( Request::get("status") == 5 && (Auth::user()->role->nama == "urtu") ))
                {{--Buttons--}}
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center text-primary">
                        <p class="mb-0">
                            Buat Form Penyerahan Takah?
                        </p>
                        <div class="d-flex">
                            <button class="btn btn-lims-gradient align-content-center ml-2"
                                    data-toggle="modal" data-target="#modalsukses4">
                                Ya, buat form
                                <i id="loader-bb"
                                   class="fas fa-circle-notch fa-spin ml-2 mt-1"
                                   style="display: none">
                                </i>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @endsection


            @section('modals')
            <!-- Modal 1-->
                <div class="modal fade"
                     id="modalsukses"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="modalsukses"
                     data-backdrop="static"
                     data-keyboard="false"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                    <span class="d-block mb-2 text-center">
                        <i class="fas fa-check-circle fa-5x text-lims-gradient"></i>
                    </span>
                                <h5 class="mb-5 font-weight-light text-center text-muted">
                                    Proses pemeriksaan akan dimulai.
                                </h5>
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">
                                        Batal
                                    </button>
                                    <a role="button"
                                       href="{{ route('dummies.takah.index', ["status" => 3]) }}"
                                       class="btn btn-lims-gradient">
                                        Ya, mulai proses
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 2-->
                <div class="modal fade"
                     id="modalsukses2"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="modalsukses"
                     data-backdrop="static"
                     data-keyboard="false"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                    <span class="d-block mb-2 text-center">
                        <i class="fas fa-check-circle fa-5x text-lims-gradient"></i>
                    </span>
                                <h5 class="mb-5 font-weight-light text-center text-muted">
                                    Takah akan diserahkan ke Kaurmin<br>
                                    Apakah anda Yakin?
                                </h5>
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">
                                        Tidak
                                    </button>
                                    <a role="button"
                                       href="{{ route('dummies.takah.index', ["status" => 2]) }}"
                                       class="btn btn-lims-gradient">
                                        Ya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 3-->
                <div class="modal fade"
                     id="modalsukses3"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="modalsukses"
                     data-backdrop="static"
                     data-keyboard="false"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                    <span class="d-block mb-2 text-center">
                        <i class="fas fa-check-circle fa-5x text-lims-gradient"></i>
                    </span>
                                <h5 class="mb-5 font-weight-light text-center text-muted">
                                    Takah akan diserahkan ke Urtu<br>
                                    Apakah anda Yakin?
                                </h5>
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">
                                        Tidak
                                    </button>
                                    <a role="button"
                                       href="{{ route('dummies.takah.index', ["status" => 5]) }}"
                                       class="btn btn-lims-gradient">
                                        Ya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 4-->
                <div class="modal fade"
                     id="modalsukses4"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="modalsukses"
                     data-backdrop="static"
                     data-keyboard="false"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                    <span class="d-block mb-2 text-center">
                        <i class="fas fa-check-circle fa-5x text-lims-gradient"></i>
                    </span>
                                <h5 class="mb-5 font-weight-light text-center text-muted">
                                    Buat Form Penyerahan Takah?
                                </h5>
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">
                                        Tidak
                                    </button>
                                    <a role="button"
                                       href="{{ route('dummies.takah.penyerahan') }}"
                                       class="btn btn-lims-gradient">
                                        Ya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection


            @section('localcss')
                <style>
                    th.bg-bssn {
                        background-color: #1AA260;
                        color: white;
                    }

                    ul.timeline {
                        list-style-type: none;
                        position: relative;
                    }

                    ul.timeline:before {
                        content: ' ';
                        background: #d4d9df;
                        display: inline-block;
                        position: absolute;
                        left: 29px;
                        width: 2px;
                        height: 100%;
                        z-index: 400;
                    }

                    ul.timeline > li {
                        margin: 20px 0;
                        padding-left: 20px;
                    }

                    ul.timeline > li:before {
                        content: ' ';
                        background: white;
                        display: inline-block;
                        position: absolute;
                        border-radius: 50%;
                        border: 3px solid #27cd9d;
                        left: 20px;
                        width: 20px;
                        height: 20px;
                        z-index: 400;
                    }
                </style>
@endsection

