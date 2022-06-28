@extends('layouts.backend.visual_grafis')

@section('content')

    {{--Links Grafik Row--}}
    @include('partials.backend.visual_grafis.grafik_tabulasi_links')

    {{--Grafik Row--}}
    <div class="row">
        <div class="col-12 mb-4 relative">
            <div class="card shadow">
                <div class="card-body">

                    {{--Judul--}}
                    <h4 class="text-center mb-1">
                        Rata-Rata Durasi Pemeriksaan <span class="text-capitalize">{{$waktu}}</span> Per Durasi
                        Pemeriksaan
                    </h4>
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

                    {{--Tabulasi--}}
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-center" style="width: 1em">No.</th>
                            <th>Nama Bidang</th>
                            <th class="text-center" width="30%">Rata-Rata Durasi Pemeriksaan (Dalam Hari)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Fiskomfor</td>
                            <td>{{ round($jumlah_fiskomfor) ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Narkobafor</td>
                            <td>{{ round($jumlah_narkobafor) ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dokupalfor</td>
                            <td>{{ round($jumlah_dokupalfor) ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Kimbiofor</td>
                            <td>{{ round($jumlah_kimbiofor) ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Balmetfor</td>
                            <td>{{ round($jumlah_balmetfor) ?? '-' }}</td>
                        </tr>
                        </tbody>
                    </table>

                    {{--buttons--}}
                    <div id="action_buttons_container" class="d-flex justify-content-between mt-5 mb-3">
                        <div></div>
                        <div>
                            <a name="" id="" class="btn btn-primary" href="{{ route('dashboard') }}" role="button">
                                Home
                            </a>
                            <button id="btn-print" class="btn btn-primary" type="button">
                                Print
                            </button>
                            <a class="btn btn-primary"
                               href="{{ route('visual_grafis.grafik.perdurasipemeriksaan', ['waktu' => $waktu, 'unitkerja' => $unitkerja]) }}"
                               role="button">
                                Grafis
                            </a>
                        </div>
                        <div></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('localscript')
    <script>
        $(function () {
            $('#btn-print').on('click', function (event) {
                event.preventDefault();
                window.print();
            })
        });
    </script>
@endsection

@section('localcss')
    <style>
        @media print {
            header, #grafik_tabulasi_links, #action_buttons_container {
                display: none !important;
            }

            .card {
                border: none;
            }

            .shadow {
                box-shadow: none !important;
            }
        }
    </style>
@endsection


