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
                    <div class="d-flex justify-content-between mt-5 mb-0">
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
                            <a class="btn btn-primary"
                               href="{{ route('visual_grafis.tabulasi.perpolda', ['unitkerja' => $unitkerja, 'waktu'=> $waktu]) }}"
                               role="button">
                                Tabulasi
                            </a>
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
                        text: 'Statistik {{ ucfirst($waktu) }} Per Polda {{ ucfirst(\App\UnitKerja::find($unitkerja)->nama) }}'
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
                            text: 'Total pemeriksaan'
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
                        color: '#5232ff',
                        name: "",
                        data: [
                                @if (!empty($takahPerPolda))
                                @foreach ($takahPerPolda as $index => $result)
                            {
                                name: `{{$index}}`, y:{{$result}} },
                            @endforeach
                            @endif
                        ],
                    }
                    ],
                })
            ;
            $('#btn-print').on('click', function (event) {
                event.preventDefault();
                chart.print();
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
