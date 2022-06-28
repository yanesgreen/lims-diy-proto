@extends('layouts.backend.default')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-5">

        {{--Judul halaman--}}
        <h4 class="mb-0 text-gray-800 d-none d-md-block">
            Daftar Takah Telah Diserahkan Thn.
            <span id="text-year">{{ $data['year'] }}</span>
        </h4>

        {{--Button kembali--}}
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cari-takah-selesai">
                Pilih Tahun
            </button>
        </div>

    </div>

    <!-- Tahun -->
    <div class="row mb-3">
        <div class="col-12">
            <table id="requestTable"
                   style="width: 100%;"
                   class="table table-bordered bg-white table-hover">
                <thead class="bg-primary text-white text-center">
                <tr>
                    <th style="width: 1%">No.</th>
                    <th>No. Takah</th>
                    <th>Detail Takah</th>
                    <th style="width: 15%">Cetakan Penerimaan</th>
                    <th style="width: 15%">Cetakan Penyerahan</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade"
         id="modal-cari-takah-selesai"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-cari-takah-selesai-label"
         aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="modal-cari-takah-selesai-label">Pilih Tahun</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-cari-takah-selesai">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tahun</label>
                            <input id="input-year" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cari Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{--local script taruh disini--}}
@section('localscript')
    <script>
        {{--    dataTable    --}}
        $(document).ready(function () {
            let url = '{{ route('takah.api.takah_telah_selesai') }}'

            $('#requestTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': url,
                    'headers': window.axios.defaults.headers.common
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nomor', name: 'nomor'},
                    {
                        data: 'detail_takah',
                        name: 'detail_takah',
                        orderable: false,
                        searchable: false,
                        class: 'text-center'
                    },
                    {data: 'link_cetak_penerimaan', name: 'link_cetak_penerimaan', orderable: false, searchable: false},
                    {data: 'link_cetak_penyerahan', name: 'link_cetak_penyerahan', orderable: false, searchable: false},
                ],
                order: [[1, 'desc']]
            })

            {{--    modal cari takah    --}}
            $('#form-cari-takah-selesai').on('submit', event => {
                event.preventDefault()
                const inputYear = $('#input-year')
                const textYear = $('#text-year')
                const newUrl = url + `?&&year=${inputYear.val()}`
                $('#requestTable').DataTable().ajax.url(newUrl).load()
                $('#modal-cari-takah-selesai').modal('hide')
                textYear.text(inputYear.val())
                inputYear.val('')
            })

        })
    </script>
@endsection

{{--local style--}}
@section('localcss')
    <style>
        tfoot {
            display: table-header-group;
        }

        .table tfoot td {
            padding: 0.25rem;
        }

        .form-control {
            font-size: 0.7rem;
        }
    </style>
@endsection
