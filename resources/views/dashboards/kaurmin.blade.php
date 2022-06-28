@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-primary">
            Dashboard Kaurmin - Tahap II
        </h4>
        <a id="lihat-takah"
           class="btn btn-secondary mb-0"
           href="{{ route('takah.index.tahap', ['tahap' => 2]) }}"
           role="button">
            Daftar Takah Di Urmin - Tahap II
        </a>
    </div>

    {{--Cards Row--}}
    <div class="row">

        {{--kiri--}}
        <div class="col-md-6 mb-4">

            <div class="card card-menu bg-primary py-3 mb-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="mb-1">
                                <div class="line"></div>
                                <h6 id="penerimaan-bb-text"
                                    class="text-white mb-0">
                                    Total Penerimaan Barang Bukti Dari Urtu
                                </h6>
                            </div>
                            <div id="penerimaan-bb-count"
                                 class="h5 mb-0 font-weight-bold text-info">
                                {{ $jumlah_takah_diterima }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i role="button"
                               class="fas fa-calendar-alt fa-3x text-white-50 shadow-raised cursor-pointer"
                               data-toggle="modal" data-target="#modal-penerimaan-bb">
                            </i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden" id="table-penerimaan-bb-container">
                <table id="table-penerimaan-bb"
                       class="table table-bordered bg-white shadow-sm">
                    <thead class="bg-primary text-white text-center">
                    <tr>
                        <th width="10%">No.</th>
                        <th>No Takah</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    </tbody>
                </table>
            </div>
        </div>

        {{--kanan--}}
        <div class="col-md-6 mb-4">

            <div class="card card-menu bg-primary py-3 mb-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="mb-1">
                                <div class="line"></div>
                                <h6 id="diserahkan-kembali-ke-urtu-text"
                                    class="text-white mb-0">
                                    Total Penyerahan BAP Laboratoris dan Barang Bukti Ke Urtu
                                </h6>
                            </div>
                            <div id="diserahkan-kembali-ke-urtu-count"
                                 class="h5 mb-0 font-weight-bold text-info">
                                {{ $jumlah_takah_siap_diserahkan }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i role="button"
                               class="fas fa-calendar-alt fa-3x text-white-50 shadow-raised cursor-pointer"
                               data-toggle="modal" data-target="#modal-diserahkan-kembali-ke-urtu">
                            </i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden" id="table-diserahkan-kembali-ke-urtu-container">
                <table id="table-diserahkan-kembali-ke-urtu"
                       class="table table-bordered bg-white shadow-sm">
                    <thead class="bg-primary text-white text-center">
                    <tr>
                        <th width="10%">No.</th>
                        <th>No Takah</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('modals')
    <!-- Modal 1 -->
    <div class="modal fade"
         id="modal-penerimaan-bb"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-penerimaan-bb"
         aria-hidden="true"
         data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!--form start-->
                    <div class="form-group mb-4">
                        <label for="tgl-penerimaaan-bb-dari-urtu">Pilih Tanggal</label>
                        <input type="date"
                               class="form-control"
                               id="tgl-penerimaaan-bb-dari-urtu">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-light mr-1" data-dismiss="modal">
                            Close
                        </button>
                        <button class="btn btn-primary"
                                id="show-table-penerimaan-bb"
                                disabled>
                            Tampilkan Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade"
         id="modal-diserahkan-kembali-ke-urtu"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-diserahkan-kembali-ke-urtu"
         aria-hidden="true"
         data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="tgl-diserahkan-kembali-ke-urtu">Pilih Tanggal</label>
                        <input type="date" class="form-control" id="tgl-diserahkan-kembali-ke-urtu">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-light mr-1" data-dismiss="modal">
                            Close
                        </button>
                        <button class="btn btn-primary"
                                id="show-table-diserahkan-kembali-ke-urtu"
                                disabled>
                            Tampilkan Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('localscript')
    <script>
        $(document).ready(function () {

            //datatable penerimaan bb
            let urlTerima = 'takah/api/diterima_oleh_kaurmin?tgl=';
            const tablePenerimaanBB = $('#table-penerimaan-bb').DataTable({
                lengthChange: false,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: {
                    'url': urlTerima,
                    'headers': window.axios.defaults.headers.common
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nomor', name: 'nomor', orderable: false, searchable: false},
                    {data: 'statustakah', name: 'statustakah', orderable: false, searchable: false},
                ],
                order: [[1, 'desc']]
            });

            // disable button penerimaan bb bila tgl === null
            $('#tgl-penerimaaan-bb-dari-urtu').on('change', function () {
                if ($(this).val() !== null) {
                    $('#show-table-penerimaan-bb').attr({'disabled': false})
                }
            });

            // show table penerimaan bb
            $('#show-table-penerimaan-bb').on('click', function () {
                $('#table-penerimaan-bb-container').css({'opacity': 1});
                urlTerima = 'takah/api/diterima_oleh_kaurmin?tgl=' + $('#tgl-penerimaaan-bb-dari-urtu').val();
                tablePenerimaanBB.ajax.url(urlTerima).load(function () {
                    let tglPenerimaan = new Date($('#tgl-penerimaaan-bb-dari-urtu').val());
                    let day = tglPenerimaan.getDate();
                    let month = tglPenerimaan.getMonth() + 1;
                    let year = tglPenerimaan.getFullYear();
                    $('#penerimaan-bb-text').text(`Penerimaaan Barang Bukti dari Urtu Tgl. ${day}/${month}/${year}`);
                    $('#penerimaan-bb-count').text(tablePenerimaanBB.page.info().recordsTotal);
                    $('#show-table-penerimaan-bb').attr({'disabled': true});
                    $('#modal-penerimaan-bb').modal('hide');
                    $('#tgl-penerimaaan-bb-dari-urtu').val(null);
                });
            });

            // datatable penyerahan bb
            let urlDiserahkanKeKaurmin = 'takah/api/siap_diserahkan_ke_urtu?tgl=';
            const tableDiserahkanKeKaurmin = $('#table-diserahkan-kembali-ke-urtu').DataTable({
                lengthChange: false,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: {
                    'url': urlDiserahkanKeKaurmin,
                    'headers': window.axios.defaults.headers.common
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nomor', name: 'nomor', orderable: false, searchable: false},
                    {data: 'statustakah', name: 'statustakah', orderable: false, searchable: false},
                ],
                order: [[1, 'desc']]
            });

            // disable button penyerahan bb bila tgl === null
            $('#tgl-diserahkan-kembali-ke-urtu').on('change', function () {
                if ($(this).val() !== null) {
                    $('#show-table-diserahkan-kembali-ke-urtu').attr({'disabled': false})
                }
            });

            // show table penyerahan bb
            $('#show-table-diserahkan-kembali-ke-urtu').on('click', function () {
                $('#table-diserahkan-kembali-ke-urtu-container').css({'opacity': 1});
                urlDiserahkanKeKaurmin = 'takah/api/siap_diserahkan_ke_urtu?tgl=' +
                    $('#tgl-diserahkan-kembali-ke-urtu').val();
                tableDiserahkanKeKaurmin.ajax.url(urlDiserahkanKeKaurmin).load(function () {
                    let tglDiserahkan = new Date($('#tgl-diserahkan-kembali-ke-urtu').val());
                    let day = tglDiserahkan.getDate();
                    let month = tglDiserahkan.getMonth() + 1;
                    let year = tglDiserahkan.getFullYear();
                    $('#diserahkan-kembali-ke-urtu-text').text(`Penyerahan BAP Laboratoris dan Barang Bukti Ke Urtu Tgl. ${day}/${month}/${year}`);
                    $('#diserahkan-kembali-ke-urtu-count').text(tableDiserahkanKeKaurmin.page.info().recordsTotal);
                    $('#show-table-diserahkan-kembali-ke-urtu').attr({'disabled': true});
                    $('#modal-diserahkan-kembali-ke-urtu').modal('hide');
                    $('#tgl-diserahkan-kembali-ke-urtu').val(null);
                });
            });

        });
    </script>
@endsection

@section('localcss')
    <style>
        .no-takah {
            color: royalblue !important;
        }

        #table-penerimaan-bb-container {
            opacity: 0;
            transition: all 0.5s ease;
        }

        #table-diserahkan-kembali-ke-urtu-container {
            opacity: 0;
            transition: all 0.5s ease;
        }
    </style>
@endsection


