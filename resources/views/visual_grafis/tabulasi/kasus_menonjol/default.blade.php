@extends('layouts.backend.visual_grafis')

{{--html content utama--}}
@section('content')

    {{--Grafik Row--}}
    <div class="row">
        <div class="col-12 my-4 relative">
            <div class="card shadow">
                <div class="card-body">
                    {{--Judul halaman--}}
                    <div class="mb-4 mt-5">
                        <h4 class="mb-1 text-gray-800 d-none d-md-block text-center">Kasus
                            Menonjol {{ ucfirst($waktu) }}</h4>
                        <h5 class="text-center mb-4">
                            @if ($waktu == 'harian')
                                {{ \Carbon\Carbon::now()->locale('id-ID')->isoFormat('LL') }}
                            @elseif ($waktu == 'mingguan')
                                Minggu Ke-{{ \Carbon\Carbon::now()->weekOfMonth }}
                                Bulan {{  \Carbon\Carbon::now()->locale('id-ID')->isoFormat('MMMM')  }}
                                Tahun {{ \Carbon\Carbon::now()->year }}
                            @elseif ($waktu == 'bulanan')
                                Bulan {{  \Carbon\Carbon::now()->locale('id-ID')->isoFormat('MMMM')  }}
                                Tahun {{ \Carbon\Carbon::now()->year }}
                            @elseif ($waktu == 'tahunan')
                                Tahun {{ \Carbon\Carbon::now()->year }}
                            @endif
                        </h5>
                    </div>

                    {{--Tabulasi--}}
                    <table id="requestTable"
                           style="width: 100%;"
                           class="table table-bordered bg-white table-hover">
                        <thead class="bg-primary text-white text-center">
                        <tr>
                            <th style="width: 2em">No.</th>
                            <th style="width: 10%">No. Takah</th>
                            <th style="width: 15%">Asal Satker</th>
                            <th style="width: 10%">Bidang</th>
                            <th style="width: 10%">Subbid</th>
                            <th>Jenis Kasus</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    {{--buttons--}}
                    <div id="action_buttons_container" class="d-flex justify-content-between mt-5 mb-3">
                        <div></div>
                        <div>
                            <a class="btn btn-primary" href="{{ route('dashboard') }}"
                               role="button"
                               style="min-width: 100px">
                                Home
                            </a>
                            <button class="btn btn-primary"
                                    type="button"
                                    onclick="window.history.back();"
                                    style="min-width: 100px">
                                Back
                            </button>
                        </div>
                        <div></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    {{--Modal Tambah--}}
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
         aria-hidden="true">
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
            //datatable
            const url = '{{ route('takah.api.kasus_menonjol', ['waktu' => $waktu,]) }}';
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
                    {data: 'asal_satker', name: 'asal_satker', class: 'text-capitalize'},
                    {data: 'bidang.singkatan', name: 'bidang.singkatan'},
                    {data: 'subbidang.singkatan', name: 'subbidang.singkatan'},
                    {data: 'jeniskasus.nama', name: 'jeniskasus.nama'},
                ],
                order: [[1, 'desc']]
            });
        });
    </script>
@endsection
