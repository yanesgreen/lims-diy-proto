@extends('layouts.cetakan.default')

@section('title')
    Formulir Penerimaan Barang Bukti
@endsection

@section('buttons')
    <a role="button" class="btn btn-lims text-decoration-none">
        Status: Diterima Urtu
    </a>
    <a role="button" class="btn btn-lims-gradient text-decoration-none" onclick="window.print()">
        Cetak
    </a>
    @if (Request::get("status") == 1)
        <a role="button" href="{{ route('dashboard') }}" class="btn btn-lims" type="button">
            Kembali
        </a>
    @else
        <a role="button" href="{{ route('dummies.takah.index') }}" class="btn btn-lims" type="button">
            Kembali
        </a>
    @endif
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
                    {{--                    {{  \Carbon\Carbon::parse($tiketMasuk->created_at)->locale('id-ID')->isoFormat('LL')  }}--}}
                    1 Juli 2020
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
                    {{--                    @if (!empty($tiketMasuk->layanan))--}}
                    {{--                        {{ $tiketMasuk->layanan->no_layanan }}--}}
                    {{--                    @endif--}}
                    000004/NNF/2020/PUS
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
                    {{--                    {{  \Carbon\Carbon::parse($tiketMasuk->created_at)->locale('id-ID')->isoFormat('LL')  }}--}}
                    Polda Metro Jaya, Polres Metro Jakarta Pusat, Polsek Menteng
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
                    {{--                    {{  \Carbon\Carbon::parse($tiketMasuk->created_at)->locale('id-ID')->isoFormat('LL')  }}--}}
                    Penyalahgunaan Narkoba
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
                    2 minggu sampai 4 minggu (15 Juli 2020 s.d 1 Agustus 2020)
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
            <td class="padding-td-normal" style="width: 3cm; text-align: center">
                <p style="text-transform: capitalize">
                    Jenis barang bukti
                </p>
            </td>
            <td class="padding-td-normal">
                <p style="text-transform: capitalize; text-align: center">
                    Keterangan/Deskripsi
                </p>
            </td>
            <td class="padding-td-normal" style="width: 1.5cm; text-align: center">
                <p>Jumlah</p>
            </td>
            <td class="padding-td-normal" style="width: 1.5cm; text-align: center">
                <p>Berat(gr)</p>
            </td>
        </tr>
        <tr>
            <td class="padding-td-normal" style="width: 0.5cm">
                <p>1</p>
            </td>
            <td class="padding-td-normal">
                <p>
                    {{--                    {{ $tiketMasuk->barang_bukti->jenisbb->nama }}--}}
                    Narkotika
                </p>
            </td>
            <td class="padding-td-normal">
                <p>
                    {{--                    {{ $tiketMasuk->barang_bukti->nama }}, {{ $tiketMasuk->barang_bukti->keterangan }},--}}
                    {{--                    {{ $tiketMasuk->barang_bukti->ciri_fisik }}--}}
                    Benzodiazepin, Dibungkus dalam segel, Warna:putih
                </p>
            </td>
            <td class="padding-td-normal">
                <p>
                    {{--                    {{ $tiketMasuk->barang_bukti->jumlah }}--}}
                    1
                </p>
            </td>
            <td class="padding-td-normal">
                <p>
                    100
                </p>
            </td>
        </tr>
    </table>

    <!--foto barang bukti-->
    <div class="mb-5" style="width: 100%; display: flex; justify-content: center">
        <figure class="text-center" style="margin: 0">
            {{--            <img src="{{ asset('storage/fotobb/' . $tiketMasuk->barang_bukti->foto) }}"--}}
            {{--                 alt="foto barang bukti" class="mb-1"--}}
            {{--                 style="height: 75px; width: auto;">--}}
            <img src="{{ asset('images/narkobafor.jpg') }}"
                 alt="bb"
                 style="height: 75px; width:75px; object-fit: cover; object-position: center">
            <figcaption>
                <p class="mb-2 font-size-8 text-bold">
                    Foto Barang Bukti
                </p>
                <p class="font-size-8">
                    {{--                    {{ $tiketMasuk->barang_bukti->nama }}--}}
                    Benzodiapin
                </p>
            </figcaption>
        </figure>
    </div>

    <!--table keterangan penyidik-->
    <div class="mb-5"
         style="display: grid; grid-template-columns: 10% 90%; grid-template-rows: 100px; grid-column-gap: 0.25em">

        <!--foto penanggung jawab-->
        <div>
            {{--            <img src="{{ asset('storage/foto_penanggung_jawab/' . $tiketMasuk->foto) }}"--}}
            {{--                 alt="foto penanggung jawab"--}}
            {{--                 style="height: 100%; width: 105px">--}}
            <img src="{{ asset('storage/avatars/yanesgreen_1575432371.jpg') }}"
                 alt="foto penanggung jawab"
                 style="height: 100%; width: 100%; object-fit: cover; object-position: top">
        </div>

        <!--detail barang bukti-->
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
                        John Doe
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div
                            style="width: 100%; height: 100%; display: grid; grid-template-columns: repeat(2, 1fr); align-items: center">
                            <div style="display: grid; grid-template-columns: 57% 5% 39%">
                                <p style="margin-bottom: 0; padding-left: 5pt">KTP/SIM/NRP</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">:</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">86071936</p>
                            </div>
                            <div style="display: grid; grid-template-columns: 27% 5% 49%">
                                <p style="margin-bottom: 0; padding-left: 5pt">Pangkat</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">:</p>
                                <p style="margin-bottom: 0; padding-left: 5pt">IPTU</p>
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
                        {{--                        {{ $tiketMasuk->no_tiket }}--}}
                        12345890
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
                    {{--                    {{ $tiketMasuk->penanggung_jawab }}--}}
                    Yulyanes
                </p>
            </div>
            <div class="padding-td-normal" style="border: 1px solid black">
                {{--                <img src="{{ asset('storage/' . $tiketMasuk->digitalsign) }}" alt="ttd" width="100%">--}}
                <img width="100%" src="{{ asset('storage/yanesOjYBJJWTei.png') }}" alt="ttd">
            </div>
        </div>

        <!--table kanan-->
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); grid-template-rows: 30px 30px">
            <!--row 1-->
            <div class="padding-td-normal text-center"
                 style="grid-column: 1 / span 2; border: 1px solid black; border-bottom: none">
                {{--                {{ $tiketMasuk->jenis == 'NSOC' ? 'Staff NSOC' : 'Kepala Lab' }}--}}
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
                    {{--                    {{ $tiketMasuk->user->nama }}--}}
                    John Doe
                </p>
            </div>
            <div class="text-center padding-td-normal" style="border: 1px solid black">
                {{--                <img src="{{ asset('storage/' . $tiketMasuk->user->digitalsign) }}" alt="ttd" width="100%">--}}
                <img width="100%" src="{{ asset('storage/yanesOjYBJJWTei.png') }}" alt="ttd">
            </div>
        </div>

    </div>

    <!--qr code-->
    <div style="width: 100%; display: flex; justify-content: center">
        <img src="{{ asset("images/qrcode_lims.png") }}" alt="qr_code" style="height: 90px">
    </div>
@endsection
