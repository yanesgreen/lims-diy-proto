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
                        <a id="btn-back" class="btn btn-primary" href="#" role="button" style="min-width: 75px">
                            Back
                        </a>
                        <div>
                            <a class="btn btn-primary" href="{{ route('dashboard') }}" role="button">
                                Home
                            </a>
                            <a id="btn-print"
                               class="btn btn-primary"
                               href="#"
                               role="button">
                                Print
                            </a>
                            <a class="btn btn-primary"
                               href="{{ route('visual_grafis.tabulasi.feedback', ['waktu' => $waktu, 'unitkerja' => $unitkerja]) }}"
                               role="button">
                                Tabulasi
                            </a>
                        </div>
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
                    type: 'bar'
                },
                title: {
                    text: 'Statistik {{ ucfirst($waktu) }} Feedback {{ \App\UnitKerja::find($unitkerja)->nama }}'
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
                xAxis: {
                    categories: [
                        `Petugas labfor Ramah Dalam Pelayanannya`,
                        `Petugas labfor Tepat waktu Dalam Pelayanannya`,
                        `Petugas labfor Cepat Datang Bila Dibantu Bantuan Pemeriksaan`,
                        `Petugas labfor Terampil Dalam Melakukan Pemeriksaan Di Lapangan`,
                        `Petugas labfor Mudah Dihubungi Oleh Penyidik`,
                        `Aplikasi LIMS Berbasis Standar SMILE Bermanfaat Dalam Transparansi Pemeriksaan`
                    ],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [
                    {
                        color: '#5232ff',
                        name: 'Sangat Puas',
                        data: [{{ $jumlah_1a }}, {{ $jumlah_2a }}, {{ $jumlah_3a }}, {{ $jumlah_4a }}, {{ $jumlah_5a }}, {{ $jumlah_6a }}]
                    },
                    {
                        color: '#66ff42',
                        name: 'Puas',
                        data: [{{ $jumlah_1b }}, {{ $jumlah_2b }}, {{ $jumlah_3b }}, {{ $jumlah_4b }}, {{ $jumlah_5b }}, {{ $jumlah_6b }}]
                    },
                    {
                        color: '#ff425d',
                        name: 'Kurang Puas',
                        data: [{{ $jumlah_1c }}, {{ $jumlah_2c }}, {{ $jumlah_3c }}, {{ $jumlah_4c }}, {{ $jumlah_5c }}, {{ $jumlah_6c }}]
                    }
                ]
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
