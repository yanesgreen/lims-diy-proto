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
                        Feedback {{ \App\UnitKerja::find(unitKerjaId())->nama }}
                        <span class="text-capitalize">{{$waktu}}</span>
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
                            <th>Pertanyaan</th>
                            <th class="text-center" style="width:10%">Sangat Puas</th>
                            <th class="text-center" style="width:10%">Puas</th>
                            <th class="text-center" style="width:10%">Kurang Puas</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Petugas labfor Ramah Dalam Pelayanannya</td>
                            <td id="a1" class="text-center">{{ $jumlah_1a }}</td>
                            <td id="b1" class="text-center">{{ $jumlah_1b }}</td>
                            <td id="c1" class="text-center">{{ $jumlah_1c }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Petugas labfor Tepat waktu Dalam Pelayanannya</td>
                            <td id="a2" class="text-center">{{ $jumlah_2a }}</td>
                            <td id="b2" class="text-center">{{ $jumlah_2b }}</td>
                            <td id="c2" class="text-center">{{ $jumlah_2c }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Petugas labfor Cepat Datang Bila Dibantu Bantuan Pemeriksaan</td>
                            <td id="a3" class="text-center">{{ $jumlah_3a }}</td>
                            <td id="b3" class="text-center">{{ $jumlah_3b }}</td>
                            <td id="c3" class="text-center">{{ $jumlah_3c }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Petugas labfor Terampil Dalam Melakukan Pemeriksaan Di Lapangan</td>
                            <td id="a4" class="text-center">{{ $jumlah_4a }}</td>
                            <td id="b4" class="text-center">{{ $jumlah_4b }}</td>
                            <td id="c4" class="text-center">{{ $jumlah_4c }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Petugas labfor Mudah Dihubungi Oleh Penyidik</td>
                            <td id="a5" class="text-center">{{ $jumlah_5a }}</td>
                            <td id="b5" class="text-center">{{ $jumlah_5b }}</td>
                            <td id="c5" class="text-center">{{ $jumlah_5c }}</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Aplikasi LIMS Berbasis Standar SMILE Bermanfaat Dalam Transparansi Pemeriksaan</td>
                            <td id="a6" class="text-center">{{ $jumlah_6a }}</td>
                            <td id="b6" class="text-center">{{ $jumlah_6b }}</td>
                            <td id="c6" class="text-center">{{ $jumlah_6c }}</td>
                        </tr>
                        <tr class="bg-light">
                            <td colspan="2" class="text-center text-bold">Total</td>
                            <td id="jml_a" class="text-center text-bold"></td>
                            <td id="jml_b" class="text-center text-bold"></td>
                            <td id="jml_c" class="text-center text-bold"></td>
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
                               href="{{ route('visual_grafis.grafik.feedback', ['waktu' => $waktu, 'unitkerja' => $unitkerja]) }}"
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

            // value
            const a1 = parseInt($('#a1').text());
            const b1 = parseInt($('#b1').text());
            const c1 = parseInt($('#c1').text());

            const a2 = parseInt($('#a2').text());
            const b2 = parseInt($('#b2').text());
            const c2 = parseInt($('#c2').text());

            const a3 = parseInt($('#a3').text());
            const b3 = parseInt($('#b3').text());
            const c3 = parseInt($('#c3').text());

            const a4 = parseInt($('#a4').text());
            const b4 = parseInt($('#b4').text());
            const c4 = parseInt($('#c4').text());

            const a5 = parseInt($('#a5').text());
            const b5 = parseInt($('#b5').text());
            const c5 = parseInt($('#c5').text());

            const a6 = parseInt($('#a6').text());
            const b6 = parseInt($('#b6').text());
            const c6 = parseInt($('#c6').text());

            $('#jml_a').text(a1 + a2 + a3 + a4 + a5 + a6);
            $('#jml_b').text(b1 + b2 + b3 + b4 + b5 + b6);
            $('#jml_c').text(c1 + c2 + c3 + c4 + c5 + c6);

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


