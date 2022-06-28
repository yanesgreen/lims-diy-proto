@extends('layouts.backend.default')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-5">

        {{--Judul halaman--}}
        <h4 class="mb-0 text-primary d-none d-md-block">
            Daftar Takah Tahap {{ angkaRomawi($tahap) }}
        </h4>

        {{--Button kembali--}}
        <div>
            @if ($tahap === 1)
                <a href="{{ route('dashboard') }}"
                   role="button"
                   class="btn btn-outline-primary">
                    Dashboard - Tahap I
                </a>
            @endif
            @if ($tahap === 2)
                <a href="{{ route('dashboard') }}"
                   role="button"
                   class="btn btn-outline-primary">
                    Dashboard - Tahap II
                </a>
            @endif
            @if ($tahap === 3)
                <a href="{{ route('dashboard.urtu2') }}"
                   role="button"
                   class="btn btn-outline-primary">
                    Dashboard - Tahap III
                </a>
            @endif
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-12">
            <table id="requestTable"
                   style="width: 100%;"
                   class="table table-bordered bg-white table-hover">
                <tfoot class="bg-light">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                @if (auth()->user()->role_id === 2)
                    <td></td>
                @endif
                <td></td>
                </tfoot>
                <thead class="bg-primary text-white text-center">
                <tr>
                    <th style="width: 1%">No.</th>
                    <th>No. Takah</th>
                    <th style="width: 30%">Status</th>
                    <th style="width: 15%">Thn Penerimaan</th>
                    @if (auth()->user()->role_id === 2)
                        <th style="width: 15%">Cetakan Penerimaan</th>
                    @endif
                    <th style="width: 10%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{--local script taruh disini--}}
@section('localscript')
    <script>
        $(document).ready(function () {
            const url = '{{ route('takah.api.tahap', ['tahap' => $tahap ]) }}'
            $('#requestTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': url,
                    'headers': window.axios.defaults.headers.common
                },
                initComplete: function () {
                    this.api().columns([1, 2, 3]).every(function () {
                        let column = this
                        let input = document.createElement("input")
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                column.search($(this).val(), false, false, true).draw()
                            })
                    });
                    $('tfoot input').addClass('form-control form-control-sm')
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nomor', name: 'nomor'},
                    {data: 'statustakah.nama', name: 'statustakah.nama', class: 'text-capitalize'},
                    {data: 'created_at', name: 'created_at'},
                        @if (auth()->user()->role_id == 2)
                    {
                        data: 'link_cetak', name: 'link_cetak'
                    },
                        @endif
                    {
                        data: 'action', name: 'action', class: 'text-center'
                    },
                ],
                order: [[1, 'desc']]
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
