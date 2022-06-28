@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Daftar Takah
            @if ((!Request::get("status")))
                - Total
            @endif
            @if (Request::get("status") == 1)
                - Diterima Urtu
            @endif
            @if (Request::get("status") == 2)
                - Diserahkan Ke Kaurmin
            @endif
            @if (Request::get("status") == 3)
                - Dlm Proses Pemeriksaan
            @endif
            @if (Request::get("status") == 4)
                - Proses Pemeriksaan Selesai
            @endif
            @if (Request::get("status") == 5)
                - Diserahkan Ke Urtu
            @endif
            @if (Request::get("status") == 6)
                - Diserahkan Ke Penyidik
            @endif
        </h4>
    </div>

    {{-- Table --}}
    <div class="row mb-5">
        <div class="col-12 overflow-hidden">
            <table id="table-search" class="table table-bordered">
                <thead class="bg-primary text-white">
                <tr>
                    <th>No.</th>
                    <th>No. Penerimaan</th>
                    <th>No. Takah</th>
                    <th>Bidang</th>
                    <th>Sub Bidang</th>
                    <th>Tersangka</th>
                    <th>Kasus</th>
                    <th class="text-center">Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @if (Request::get("status") == 1 || (!Request::get("status")))
                    <tr>
                        <td>1</td>
                        <td>6060</td>
                        <td>70670</td>
                        <td>Dokupalfor</td>
                        <td>Dokumen</td>
                        <td>John Doe</td>
                        <td>Pemalsuan dokumen</td>
                        <td>
                            <span class="badge badge-baru-masuk d-block">
                                baru masuk
                            </span>
                        </td>
                        <td>
                            @if (Auth::user()->role->nama == "urtu")
                                <a role="button"
                                   class="btn-aksi badge"
                                   href="{{ route("dummies.takah.detail", ["status" => 1]) }}">
                                    lihat
                                </a>
                            @else
                                <a role="button" class="btn-aksi-nonaktif badge" href="javascript:void(0)">
                                    ...
                                </a>
                            @endif
                        </td>
                    </tr>
                @endif
                @if (Request::get("status") == 2 || (!Request::get("status")))
                    <tr>
                        <td>2</td>
                        <td>6061</td>
                        <td>70671</td>
                        <td>Dokupalfor</td>
                        <td>Dokumen</td>
                        <td>John Doe</td>
                        <td>Pemalsuan dokumen</td>
                        <td>
                            <span class="badge badge-diserahkan-ke-kaurmin d-block">
                                diserahkan ke kaurmin
                            </span>
                        </td>
                        <td>
                            @if (Auth::user()->role->nama == "kaurmin")
                                <a role="button"
                                   class="btn-aksi badge"
                                   href="{{ route("dummies.takah.detail", ["status" => 2]) }}">
                                    lihat
                                </a>
                            @else
                                <a role="button" class="btn-aksi-nonaktif badge" href="javascript:void(0)">
                                    ...
                                </a>
                            @endif
                        </td>
                    </tr>
                @endif
                @if (Request::get("status") == 3 || (!Request::get("status")))
                    <tr>
                        <td>3</td>
                        <td>6061</td>
                        <td>70671</td>
                        <td>Dokupalfor</td>
                        <td>Dokumen</td>
                        <td>John Doe</td>
                        <td>Pemalsuan dokumen</td>
                        <td>
                            <span class="badge badge-proses-pemeriksaan d-block">
                                proses pemeriksaan
                            </span>
                        </td>
                        <td>
                            @if (Auth::user()->role->nama == "kaurmin")
                                <a role="button"
                                   class="btn-aksi badge"
                                   href="{{ route("dummies.takah.edit.tambah_pemeriksa") }}">
                                    pemeriksa
                                </a>
                            @else
                                <a role="button" class="btn-aksi-nonaktif badge" href="javascript:void(0)">
                                    ...
                                </a>
                            @endif
                        </td>
                    </tr>
                @endif
                @if (Request::get("status") == 4 || (!Request::get("status")))
                    <tr>
                        <td>4</td>
                        <td>6063</td>
                        <td>70673</td>
                        <td>Dokupalfor</td>
                        <td>Dokumen</td>
                        <td>John Doe</td>
                        <td>Pemalsuan dokumen</td>
                        <td>
                            <span class="badge badge-pemeriksaan-selesai d-block">
                                pemeriksaan selesai
                            </span>
                        </td>
                        <td>
                            @if (Auth::user()->role->nama == "kaurmin")
                                <a role="button"
                                   class="btn-aksi badge"
                                   href="{{ route("dummies.takah.detail", ["status" => 4]) }}">
                                    lihat
                                </a>
                            @else
                                <a role="button" class="btn-aksi-nonaktif badge" href="javascript:void(0)">
                                    ...
                                </a>
                            @endif
                        </td>
                    </tr>
                @endif
                @if (Request::get("status") == 5 || (!Request::get("status")))
                    <tr>
                        <td>5</td>
                        <td>6064</td>
                        <td>70674</td>
                        <td>Dokupalfor</td>
                        <td>Dokumen</td>
                        <td>John Doe</td>
                        <td>Pemalsuan dokumen</td>
                        <td>
                            <span class="badge badge-diserahkan-ke-urtu d-block">diserahkan ke urtu</span>
                        </td>
                        <td>
                            @if (Auth::user()->role->nama == "urtu")
                                <a role="button"
                                   class="btn-aksi badge"
                                   href="{{ route("dummies.takah.detail", ["status" => 5]) }}">
                                    lihat
                                </a>
                            @else
                                <a role="button" class="btn-aksi-nonaktif badge" href="javascript:void(0)">
                                    ...
                                </a>
                            @endif
                        </td>
                    </tr>
                @endif
                @if (Request::get("status") == 6 || (!Request::get("status")))
                    <tr>
                        <td>7</td>
                        <td>6065</td>
                        <td>70675</td>
                        <td>Dokupalfor</td>
                        <td>Dokumen</td>
                        <td>John Doe</td>
                        <td>Pemalsuan dokumen</td>
                        <td>
                            <span class="badge badge-diserahkan-ke-penyidik d-block">diserahkan ke penyidik</span>
                        </td>
                        <td>
                            @if (Auth::user()->role->nama == "urtu")
                                <a role="button"
                                   class="btn-aksi badge"
                                   href="{{ route("dummies.takah.detail", ["status" => 6]) }}">
                                    lihat
                                </a>
                            @else
                                <a role="button" class="btn-aksi-nonaktif badge" href="javascript:void(0)">
                                    ...
                                </a>
                            @endif
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
