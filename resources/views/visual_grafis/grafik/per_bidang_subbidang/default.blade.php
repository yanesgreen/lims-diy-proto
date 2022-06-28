@extends('layouts.backend.visual_grafis')

@section('content')

    {{--Links Grafik Row--}}
    @include('partials.backend.visual_grafis.grafik_tabulasi_links')

    {{--Grafik Row--}}
    <div class="row">
        <div class="col-12 mb-4 relative">
            <div class="card shadow">
                <div class="card-body">

                    {{--Grafik--}}
                    <div id="grafik"></div>

                    {{--buttons--}}
                    <div class="d-flex justify-content-between mt-5 mb-3">
                        {{--kiri--}}
                        <a id="btn-back" class="btn btn-primary" href="#" role="button" style="min-width: 75px">
                            Back
                        </a>

                        {{--tengah--}}
                        <div class="d-flex">
                            <a class="btn btn-primary" href="{{ route('dashboard') }}" role="button">
                                Home
                            </a>
                            <a id="btn-print"
                               class="btn btn-primary mx-2"
                               href="#"
                               role="button">
                                Print
                            </a>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle"
                                        type="button" id="dropdownMenuTabulasiBidang"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                    Tabulasi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuTabulasiBidang">
                                    <a class="dropdown-item"
                                       href="{{ route('visual_grafis.tabulasi.perbidang', [
                                                                   'waktu' => $waktu,
                                                                   'unitkerja' => $unitkerja,
                                                                   ]) }}"
                                       role="button">
                                        Tabulasi Bidang
                                    </a>
                                    <a class="dropdown-item"
                                       href="{{ route('visual_grafis.tabulasi.persubbidang', [
                                       'unitkerja' => $unitkerja,
                                       'waktu' => $waktu,
                                       'bidang_id' => 3
                                       ]) }}">
                                        Tabulasi Sub Bidang Fiskomfor
                                    </a>
                                    <a class="dropdown-item"
                                       href="{{ route('visual_grafis.tabulasi.persubbidang', [
                                       'unitkerja' => $unitkerja,
                                       'waktu' => $waktu,
                                       'bidang_id' => 5
                                       ]) }}">
                                        Tabulasi Sub Bidang Narkobafor
                                    </a>
                                    <a class="dropdown-item"
                                       href="{{ route('visual_grafis.tabulasi.persubbidang', [
                                       'unitkerja' => $unitkerja,
                                       'waktu' => $waktu,
                                       'bidang_id' => 1
                                       ]) }}">
                                        Tabulasi Sub Bidang Dokupalfor
                                    </a>
                                    <a class="dropdown-item"
                                       href="{{ route('visual_grafis.tabulasi.persubbidang', [
                                       'unitkerja' => $unitkerja,
                                       'waktu' => $waktu,
                                       'bidang_id' => 4
                                       ]) }}">
                                        Tabulasi Sub Bidang Kimbiofor
                                    </a>
                                    <a class="dropdown-item"
                                       href="{{ route('visual_grafis.tabulasi.persubbidang', [
                                       'unitkerja' => $unitkerja,
                                       'waktu' => $waktu,
                                       'bidang_id' => 2
                                       ]) }}">
                                        Tabulasi Sub Bidang Balmetfor
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{--kanan--}}
                        <button class="btn btn-primary"
                                type="button"
                                style="min-width: 75px"
                                disabled>
                            Next
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('localscript')
    <script src="{{ asset('js/highcharts/highcharts.js') }}"></script>
    <script src="{{ asset('js/highcharts/drilldown.js') }}"></script>
    <script src="{{ asset('js/highcharts/exporting.js') }}"></script>
    <script>
        $(function () {

            $('#btn-back').on('click', function (event) {
                event.preventDefault();
                window.history.back();
            });

            const chart = Highcharts.chart('grafik', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Statistik {{ ucfirst($waktu) }} Per Bidang dan Subbidang {{ \App\UnitKerja::find($unitkerja)->nama }}'
                },
                @if( $waktu == 'harian')
                subtitle: {
                    text: '{{ \Carbon\Carbon::now()->locale('id-ID')->isoFormat('LL') }}'
                },
                @elseif($waktu == 'mingguan')
                subtitle: {
                    text: `Minggu Ke-{{ \Carbon\Carbon::now()->weekOfMonth }}
                    Bulan {{ \Carbon\Carbon::now()->locale('id-ID')->isoFormat('MMMM') }}
                    Tahun {{ \Carbon\Carbon::now()->year }}`
                },
                @elseif($waktu == 'bulanan')
                subtitle: {
                    text: `Bulan {{ \Carbon\Carbon::now()->locale('id-ID')->isoFormat('MMMM') }}
                            Tahun {{ \Carbon\Carbon::now()->year }}`
                },
                @elseif($waktu == 'tahunan')
                subtitle: {
                    text: `Tahun {{ \Carbon\Carbon::now()->year }}`
                },
                @endif
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total Takah'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> takah<br/>'
                },

                series: [{
                    name: "Bidang",
                    color: '#5232ff',
                    data: [{
                        name: "Fiskomfor",
                        y: {{ $jumlah_fiskomfor }},
                        drilldown: "Fiskomfor"
                    },
                        {
                            name: "Narkobafor",
                            y: {{ $jumlah_narkobafor }},
                            drilldown: "Narkobafor"
                        },
                        {
                            name: "Dokupalfor",
                            y: {{ $jumlah_dokupalfor }},
                            drilldown: "Dokupalfor"
                        },
                        {
                            name: "Kimbiofor",
                            y: {{ $jumlah_kimbiofor }},
                            drilldown: "Kimbiofor"
                        },
                        {
                            name: "Balmetfor",
                            y: {{ $jumlah_balmetfor }},
                            drilldown: "Balmetfor"
                        },
                    ]
                }],

                drilldown: {
                    series: [
                        {
                            name: "Fiskomfor",
                            id: "Fiskomfor",
                            color: '#48c8ff',
                            data: [
                                [
                                    "SUBBIDDETEKSUS",
                                    {{   $jumlah_subbiddeteksus }}
                                ],
                                [
                                    "SUBBIDLAKABAKAR",
                                    {{ $jumlah_subbidlakabakar }}
                                ],
                                [
                                    "SUBBIDKOMFOR",
                                    {{ $jumlah_subbidkomfor }}
                                ]
                            ]
                        },
                        {
                            name: "Narkobafor",
                            id: "Narkobafor",
                            data: [
                                [
                                    "SUBBIDNARKO",
                                    {{ $jumlah_subbidnarko }}
                                ],
                                [
                                    "SUBBIDPSIKO",
                                    {{  $jumlah_subbidpsiko }}
                                ],
                                [
                                    "SUBBIDBAYA",
                                    {{  $jumlah_subbidbaya }}
                                ]
                            ]
                        },
                        {
                            name: "Dokupalfor",
                            id: "Dokupalfor",
                            data: [
                                [
                                    "BIDDOKUPALFOR",
                                    {{ $jumlah_subbiddokumen }}
                                ],
                                [
                                    "SUBBIDUPAL",
                                    {{ $jumlah_subbidupal }}
                                ],
                                [
                                    "SUBBIDPRODCET",
                                    {{ $jumlah_subbidprodcet }}
                                ]
                            ]
                        },
                        {
                            name: "Kimbiofor",
                            id: "Kimbiofor",
                            data: [
                                [
                                    "SUBBIDKIM",
                                    {{ $jumlah_subbidkim }}
                                ],
                                [
                                    "SUBBIDBIOSER",
                                    {{ $jumlah_subbidbioser }}
                                ],
                                [
                                    "SUBBIDTOKLING",
                                    {{ $jumlah_subbidtokling }}
                                ]
                            ]
                        },
                        {
                            name: "Balmetfor",
                            id: "Balmetfor",
                            data: [
                                [
                                    "SUBBIDSENPI",
                                    {{ $jumlah_subbidsenpi }}
                                ],
                                [
                                    "SUBBIDHANDAK",
                                    {{ $jumlah_subbidhandak }}
                                ],
                                [
                                    "SUBBIDMETAL",
                                    {{ $jumlah_subbidmetal }}
                                ]
                            ]
                        },
                    ]
                }
            });

            $('#btn-print').on('click', function (event) {
                event.preventDefault();
                chart.print();
            });

        });
    </script>
@endsection

@section('localcss')
    <link rel="stylesheet" href="{{ asset('css/highcharts.css') }}">
    <style></style>
@endsection
