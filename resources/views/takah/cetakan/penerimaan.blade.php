@extends('layouts.cetakan.default')

@section('title')
    Formulir Penerimaan Barang Bukti
@endsection

@section('buttons')
    <a role="button" class="btn btn-lims text-decoration-none">
        Status: {{ $takah->status }}
    </a>
    <a role="button" class="btn btn-lims-gradient text-decoration-none" onclick="window.print()">
        Cetak
    </a>
    <a role="button" href="{{ route('dashboard') }}" class="btn btn-lims">
        Ke Dashboard
    </a>
@endsection

@section('namaFormulir')
    Formulir Penerimaan Barang Bukti
@endsection

@section('content')
    <!--no tiket dan no dokumen-->
    <table class="table table-bordered-horizontal mb-5">
        <tr>
            <td class="padding-td-normal" style="width: 31%">
                <p style="text-align: left">
                    Tanggal Penerimaan
                </p>
            </td>
            <td class="padding-td-normal text-center" style="width: 1%">
                :
            </td>
            <td class="padding-td-normal" style="width: 68%">
                <p style="text-align: left">
                    {{  \Carbon\Carbon::parse($takah->created_at)->locale('id-ID')->isoFormat('LL')  }}
                </p>
            </td>
        </tr>
        <tr>
            <td class="padding-td-normal">
                <p>
                    No. Takah
                </p>
            </td>
            <td class="padding-td-normal text-center">
                :
            </td>
            <td class="padding-td-normal">
                <p>
                    {{ $takah->nomor }}
                </p>
            </td>
        </tr>
        <tr>
            <td class="padding-td-normal">
                <p>
                    Satker/Lembaga Pengirim
                </p>
            </td>
            <td class="padding-td-normal text-center">
                :
            </td>
            <td class="padding-td-normal">
                <p>
                    {{ $takah->asaltakah->satker_id ? ($takah->asaltakah->satker->nama . '. ') : '' }}
                    {{ $takah->asaltakah->polda_id ? ($takah->asaltakah->polda->nama . '. ') : '' }}
                    {{ $takah->asaltakah->polres_id ? ($takah->asaltakah->polres->nama . '. ') : '' }}
                    {{ $takah->asaltakah->polsek_id ? ($takah->asaltakah->polsek->nama . '. ') : '' }}
                    {{ $takah->asaltakah->lembaga_id ? ($takah->asaltakah->lembaga->nama . '. ') : '' }}
                </p>
            </td>
        </tr>
        <tr>
            <td class="padding-td-normal">
                <p style="text-align: left">
                    Jenis Kasus
                </p>
            </td>
            <td class="padding-td-normal text-center">
                :
            </td>
            <td class="padding-td-normal">
                <p style="text-align: left">
                    {{ $takah->jeniskasus->nama }}
                </p>
            </td>
        </tr>
        <tr>
            <td class="padding-td-normal">
                <p style="text-align: left">
                    Tersangka/Terlapor
                </p>
            </td>
            <td class="padding-td-normal text-center">
                :
            </td>
            <td class="padding-td-normal">
                <p style="text-align: left">
                    {{ $takah->tersangka[0]->nama ?? '' }}
                </p>
            </td>
        </tr>
        <tr>
            <td class="padding-td-normal">
                <p style="text-align: left">
                    Prediksi Selesainya Pemeriksaan
                </p>
            </td>
            <td class="padding-td-normal text-center">
                :
            </td>
            <td class="padding-td-normal">
                <p style="text-align: left">
                    2 minggu sampai 4 minggu (
                    <span>
                        {{\Carbon\Carbon::parse($takah->created_at)->addWeek(2)->locale('id-ID')->isoFormat('LL')}}
                    </span>
                    s.d
                    <span>
                        {{\Carbon\Carbon::parse($takah->created_at)->addWeek(4)->locale('id-ID')->isoFormat('LL')}}
                    </span>
                    )
                </p>
            </td>
        </tr>
    </table>

    <!--table barang bukti-->
    <table class="table table-bordered mb-5">
        <tr>
            <td class="padding-td-normal" style="width: 0.5cm; text-align: center">
                <p>No.</p>
            </td>
            <td class="padding-td-normal" style="width: 5cm; text-align: center">
                <p style="text-transform: capitalize">
                    Jenis barang bukti
                </p>
            </td>
            {{--            <td class="padding-td-normal">--}}
            {{--                <p style="text-transform: capitalize; text-align: center">--}}
            {{--                    Keterangan/Deskripsi--}}
            {{--                </p>--}}
            {{--            </td>--}}
            <td class="padding-td-normal" style="width: 1cm; text-align: center">
                <p>Jumlah</p>
            </td>
            <td class="padding-td-normal" style="width: 1cm; text-align: center">
                <p>Berat(gr)</p>
            </td>
        </tr>
        @if (!empty($takah->barangbukti))
            @foreach ($takah->barangbukti as $index => $result)
                <tr>
                    <td class="padding-td-normal" style="width: 0.5cm; text-align: center">
                        <p>{{ $index+1 }}</p>
                    </td>
                    <td class="padding-td-normal">
                        <p>
                            {{ $result->jenisbb->nama ?? '' }}
                        </p>
                    </td>
                    {{--                    <td class="padding-td-normal">--}}
                    {{--                        <p>--}}
                    {{--                            {{ $result->deskripsi ?? '' }}--}}
                    {{--                        </p>--}}
                    {{--                    </td>--}}
                    <td class="padding-td-normal" style="overflow-x: hidden">
                        <p>
                            {{ $result->jumlah ?? '' }}
                        </p>
                    </td>
                    <td class="padding-td-normal">
                        <p>
                            {{ $result->berat ?? '' }}
                        </p>
                    </td>
                </tr>
            @endforeach
        @endif

    </table>

    <!--foto barang bukti-->
    <div class="mb-5" style="width: 100%; display: flex; justify-content: center">
        <figure class="text-center" style="margin: 0">
            <img src="{{ asset('storage/'. $takah->foto_bb) }}"
                 alt="bb"
                 style="height: 75px; object-position: center">
            <figcaption>
                <p class="mb-1 font-size-8 text-bold">
                    Foto Barang Bukti
                </p>
            </figcaption>
        </figure>
    </div>

    <!--table keterangan penyidik-->
    <div class="mb-5"
         style="display: grid; grid-template-columns: 10% 90%; grid-template-rows: 100px; grid-column-gap: 0.25em">

        <!--foto penanggung jawab-->
        <div>
            <img src="{{ asset('storage/' . $takah->penyidik->foto) }}"
                 alt="foto penyidik"
                 style="height: 100%; width: 100%; object-fit: cover; object-position: top">
        </div>

        <!--Detail Penyidik-->
        <div>
            <table class="table  table-va-center table-bordered-horizontal" style="height: 100%">
                <tr>
                    <td class="pl-1" style="width: 29%">
                        Nama Penyidik/Pengirim
                    </td>
                    <td class="pl-1" style="width: 1%">
                        :
                    </td>
                    <td class="pl-1" style="width: 70%">
                        {{ $takah->penyidik->nama ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div
                            style="width: 100%; height: 100%; display: grid; grid-template-columns: repeat(2, 1fr); align-items: center">
                            <div style="display: grid; grid-template-columns: 57% 5% 39%">
                                <p style="margin-bottom: 0; padding-left: 5pt">KTP/SIM/NRP</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">:</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">{{ $takah->penyidik->no_identitas }}</p>
                            </div>
                            <div style="display: grid; grid-template-columns: 27% 5% 49%">
                                <p style="margin-bottom: 0; padding-left: 5pt">Pangkat</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">:</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">{{ $takah->penyidik->pangkat->singkatan ?? '' }}</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="pl-1">
                        No. Telepon
                    </td>
                    <td class="pl-1">
                        :
                    </td>
                    <td class="pl-1">
                        {{ $takah->penyidik->telepon }}
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!--table pengirim dan table urtu-->
    <div class="mb-5" style="display: grid; grid-template-columns: repeat(2, 1fr); grid-column-gap: 0.5em">

        <!--table kiri-->
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); grid-template-rows: 30px 30px">
            <!--row 1-->
            <div class="padding-td-normal text-center"
                 style="grid-column: 1 / span 2; border: 1px solid black; border-bottom: none">
                Penyidik/Pengirim
            </div>
            <!--row 2-->
            <div class="text-center padding-td-normal"
                 style="border: 1px solid black; border-right: none; border-bottom: none">
                <p>Nama</p>
            </div>
            <div class="text-center padding-td-normal" style="border: 1px solid black; border-bottom: none">
                <p>Tanda Tangan</p>
            </div>
            <!--row 3-->
            <div class="text-center padding-td-normal" style="border: 1px solid black; border-right: none">
                <p>
                    {{ $takah->penyidik->nama }}
                </p>
            </div>
            <div class="padding-td-normal" style="border: 1px solid black">
                <img src="{{ asset('storage/' . $takah->penyidik->digitalsign) }}" alt="ttd" width="100%">
            </div>
        </div>

        <!--table kanan-->
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); grid-template-rows: 30px 30px">
            <!--row 1-->
            <div class="padding-td-normal text-center"
                 style="grid-column: 1 / span 2; border: 1px solid black; border-bottom: none">
                Staf Urtu/Personil Penerima
            </div>
            <!--row 2-->
            <div class="text-center padding-td-normal"
                 style="border: 1px solid black; border-right: none; border-bottom: none">
                <p>Nama</p>
            </div>
            <div class="text-center padding-td-normal" style="border: 1px solid black; border-bottom: none">
                <p>Tanda Tangan</p>
            </div>
            <!--row 3-->
            <div class="text-center padding-td-normal" style="border: 1px solid black; border-right: none">
                <p class="text-center">
                    {{ $takah->urtu->nama }}
                </p>
            </div>
            <div class="text-center padding-td-normal" style="border: 1px solid black">
                <img src="{{ asset('storage/' . $takah->urtu->digitalsign) }}" alt="ttd" width="100%">
            </div>
        </div>

    </div>

    <!--qr code-->
    <div style="width: 100%; display: flex; justify-content: center">
        {!! QrCode::size(100)->generate(route('takah.detail_scan', $takah->id)); !!}
    </div>
@endsection
