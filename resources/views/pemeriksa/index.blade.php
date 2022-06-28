@extends('layouts.backend.default')

{{--html content utama--}}
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-5">

        {{--Judul halaman--}}
        <h4 class="mb-0 text-primary d-none d-md-block">Daftar Pemeriksa</h4>

        {{--Button tambah jabatan baru--}}
        <a role="button"
           href="{{ route('pemeriksa.create') }}"
           title="Tambah Pemeriksa"
           class="btn btn-primary modal-show">
            Tambah Pemeriksa
        </a>

    </div>

    {{--Tabel Daftar Jabatan--}}
    <div class="row mb-3">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            <table id="requestTable" style="width: 100%;"
                   class="table table-bordered bg-white table-hover">
                <thead class="bg-primary text-white text-center">
                <tr>
                    <th style="width: 2em">No.</th>
                    <th>Nama</th>
                    <th>NRP</th>
                    <th>Bidang</th>
                    <th>Pangkat</th>
                    {{--                    <th>Unit Kerja</th>--}}
                    <th class="d-none">Created_At</th>
                    <th style="width: 10em">Aksi</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modals')
    {{--Modal Tambah--}}
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="modal-header" class="modal-header">
                    <h5 id="modal-title" class="modal-title text-white"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal-body" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batalkan</button>
                    <button type="button" id="modal-save" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{--Modal Sukses--}}
    <div class="modal fade" id="modalSukses" tabindex="-1" role="dialog" aria-labelledby="modalSukses"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 id="message" class="text-center mb-3"></h5>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--local script taruh disini--}}
@section('localscript')
    <script>
        $(document).ready(function () {
            // tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // alert
            $(".alert").alert();

            //datatable
            const url = '{{ route('pemeriksa.api') }}';
            $('#requestTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': url,
                    'headers': window.axios.defaults.headers.common
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nama', name: 'nama', orderable: true},
                    {data: 'nrp', name: 'nrp', orderable: true},
                    {data: 'bidang.nama', name: 'bidang.nama'},
                    {data: 'pangkat.nama', name: 'pangkat.nama'},
                    // {data: 'unitkerja', name: 'unitkerja', orderable: true, searchable: false},
                    {data: 'created_at', name: 'created_at', class: 'd-none'},
                    {data: 'action', name: 'action', class: 'text-center', orderable: false, searchable: false}
                ],
                order: [[1, 'asc']]
            });
        });
    </script>
@endsection
