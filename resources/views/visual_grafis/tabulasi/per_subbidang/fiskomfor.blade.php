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
                        Statistik Pemeriksaan <span class="text-capitalize">{{$waktu}}</span>
                        Per Sub Bidang {{ \App\Bidang::find($bidang_id)->singkatan }}
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
                            <th>Nama Sub Bidang</th>
                            <th classs="text-center">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Subbidteksus</td>
                            <td id="jml_a">{{ $jumlah_subbiddeteksus }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Subbidlakabakar</td>
                            <td id="jml_b">{{ $jumlah_subbidlakabakar }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Subbidkomfor</td>
                            <td id="jml_c">{{ $jumlah_subbidkomfor }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="bg-light text-center">Total</td>
                            <td id="jml_total"></td>
                        </tr>
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
                               href="{{ route('visual_grafis.grafik.perbidang_subbidang', ['waktu' => $waktu, 'unitkerja' => $unitkerja]) }}"
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
            });

            const jml_a = parseInt($('#jml_a').text());
            const jml_b = parseInt($('#jml_b').text());
            const jml_c = parseInt($('#jml_c').text());
            const jml_total = jml_a + jml_b + jml_c;
            $('#jml_total').text(jml_total);

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


