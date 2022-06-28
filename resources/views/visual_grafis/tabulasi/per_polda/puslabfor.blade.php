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
                        Statistik Pemeriksaan <span class="text-capitalize">{{$waktu}}</span> Per Polda
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
                            <th>Nama Polda</th>
                            <th classs="text-center">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Polda Metro Jaya</td>
                            <td>{{ $jumlah_polda_metro_jaya }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Polda Banten</td>
                            <td>{{ $jumlah_polda_banten }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Polda Jawa Barat</td>
                            <td>{{ $jumlah_polda_jabar }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Polda Kalimantan Barat</td>
                            <td>{{ $jumlah_polda_kalbar }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Lain-Lain</td>
                            <td>{{ $jumlah_lainnya }}</td>
                        </tr>
                        <tr class="bg-light">
                            <td colspan="2" class="text-center">Total</td>
                            <td>{{ $jumlah_total }}</td>
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
                               href="{{ route('visual_grafis.grafik.perpolda', ['waktu' => $waktu, 'unitkerja' => $unitkerja]) }}"
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


