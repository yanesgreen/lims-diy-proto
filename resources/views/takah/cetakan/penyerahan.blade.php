@extends('layouts.cetakan.default')

@section('title')
    Formulir Penyerahan Barang Bukti
@endsection

@section('buttons')
    <a role="button" class="btn btn-lims text-decoration-none">
        Status: Diserahkan Ke Penyidik/Penerima
    </a>
    <a role="button" class="btn btn-lims-gradient text-decoration-none" onclick="window.print()">
        Cetak
    </a>
    <a role="button" href="{{ route('dashboard.urtu2') }}" class="btn btn-lims" type="button">
        Kembali
    </a>
@endsection

@section('namaFormulir')
    Formulir Penyerahan Barang Bukti
@endsection

@section('content')
    <!--no tiket dan no dokumen-->
    <table class="table table-bordered-horizontal mb-5">
        <tr>
            <td class="padding-td-normal" style="width: 31%">
                <p style="text-align: left">
                    Tanggal Penyerahan
                </p>
            </td>
            <td class="padding-td-normal text-center" style="width: 1%">
                :
            </td>
            <td class="padding-td-normal" style="width: 68%">
                <p style="text-align: left">
                    {{  \Carbon\Carbon::parse($takah->diserahkan_ke_penyidik_at)->locale('id-ID')->isoFormat('LL')  }}
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
            <img src="{{ asset('storage/' . $takah->penyidikpenerima->foto) }}"
                 alt="foto penanggung jawab"
                 style="height: 100%; width: 100%; object-fit: cover; object-position: top">
        </div>

        <!--detail penyidik-->
        <div>
            <table class="table  table-va-center table-bordered-horizontal" style="height: 100%">
                <tr>
                    <td class="pl-1" style="width: 29%">
                        Nama Penyidik/Penerima
                    </td>
                    <td class="pl-1" style="width: 1%">
                        :
                    </td>
                    <td class="pl-1" style="width: 70%">
                        {{ $takah->penyidikpenerima->nama ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div
                            style="width: 100%; height: 100%; display: grid; grid-template-columns: repeat(2, 1fr); align-items: center">
                            <div style="display: grid; grid-template-columns: 57% 5% 39%">
                                <p style="margin-bottom: 0; padding-left: 5pt">KTP/SIM/NRP</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">:</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">{{ $takah->penyidikpenerima->no_identitas ?? '' }}</p>
                            </div>
                            <div style="display: grid; grid-template-columns: 27% 5% 49%">
                                <p style="margin-bottom: 0; padding-left: 5pt">Pangkat</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">:</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">{{ $takah->penyidikpenerima->pangkat->singkatan ?? '' }}</p>
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
                        {{ $takah->penyidikpenerima->telepon }}
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
                Penyidik/Penerima
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
                    {{ $takah->penyidikpenerima->nama }}
                </p>
            </div>
            <div class="padding-td-normal" style="border: 1px solid black">
                <img src="{{ asset('storage/' . $takah->penyidikpenerima->digitalsign) }}" alt="ttd" width="100%">
            </div>
        </div>

        <!--table kanan-->
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); grid-template-rows: 30px 30px">
            <!--row 1-->
            <div class="padding-td-normal text-center"
                 style="grid-column: 1 / span 2; border: 1px solid black; border-bottom: none">
                {{--                {{ $tiketMasuk->jenis == 'NSOC' ? 'Staff NSOC' : 'Kepala Lab' }}--}}
                Staf Urtu/Personil Penyerahan
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
                    {{ $takah->urtupenyerah->nama }}
                </p>
            </div>
            <div class="text-center padding-td-normal" style="border: 1px solid black">
                <img src="{{ asset('storage/' . $takah->urtupenyerah->digitalsign) }}" alt="ttd" width="100%">
            </div>
        </div>

    </div>

    <!--qr code-->
    <div style="width: 100%; display: flex; justify-content: center">
        {!! QrCode::size(100)->generate(route('takah.cetakan.penyerahan', $takah->id)); !!}
    </div>
@endsection
