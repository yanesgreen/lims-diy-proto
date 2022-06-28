@extends('layouts.dummies.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Tgl. Penerimaan</th>
                            <td>
                                {{  \Carbon\Carbon::parse($takah->created_at)->locale('id-ID')->isoFormat('LL')  }}
                            </td>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <th scope="row">No. Takah</th>
                            <td>
                                {{ $takah->nomor }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Satker/Lembaga Pengirim</th>
                            <td>
                                {{ $takah->asaltakah->satker_id ? ($takah->asaltakah->satker->nama . '. ') : '' }}
                                {{ $takah->asaltakah->polda_id ? ($takah->asaltakah->polda->nama . '. ') : '' }}
                                {{ $takah->asaltakah->polres_id ? ($takah->asaltakah->polres->nama . '. ') : '' }}
                                {{ $takah->asaltakah->polsek_id ? ($takah->asaltakah->polsek->nama . '. ') : '' }}
                                {{ $takah->asaltakah->lembaga_id ? ($takah->asaltakah->lembaga->nama . '. ') : '' }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Kasus</th>
                            <td colspan="2">
                                {{ $takah->jeniskasus->nama }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Prediksi Selesainya Pemeriksaan
                            </th>
                            <td colspan="2">
                                2 minggu sampai 4 minggu (
                                <span>
                                    {{\Carbon\Carbon::parse($takah->created_at)->addWeek(2)->locale('id-ID')->isoFormat('LL')}}
                                </span>
                                s.d
                                <span>
                                    {{\Carbon\Carbon::parse($takah->created_at)->addWeek(4)->locale('id-ID')->isoFormat('LL')}}
                                </span>
                                )
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Status
                            </th>
                            <td colspan="2">
                                {{ $takah->statustakah->keterangan }}
                                @if ($takah->keteranganformiltambahan ||$takah->keteranganteknistambahan)
                                    <br>Kelengkapan teknis/formil masih kurang
                                    <br>
                                    <span>(</span>
                                    @if ($takah->keteranganformiltambahan)
                                        {{ $takah->keteranganformiltambahan->nama }}.
                                    @endif
                                    @if ($takah->keteranganteknistambahan)
                                        {{ $takah->keteranganteknistambahan->nama }}.
                                    @endif
                                    <span>)</span>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <a href="{{ route('dashboard') }}" class="btn btn-info">
                        Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection

