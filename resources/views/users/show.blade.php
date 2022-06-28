@extends('layouts.backend.default')

@section('content')
    {{--Judul halaman--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-primary">Detail Pengguna</h4>
        <a class="btn btn-outline-primary" href="{{ route('pengguna.index') }}" role="button">Kembali</a>
    </div>

    {{--Row 1--}}
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-responsive  bg-white shadow-sm">
                <tr>
                    <th style="width: 10em" class="text-white bg-primary">NRP</th>
                    <td class="text-capitalize text-left">{{ $user->nrp ?? '' }}</td>
                </tr>
                <tr>
                    <th style="width: 10em" class="text-white bg-primary">Nama</th>
                    <td class="text-capitalize text-left">{{ $user->nama ?? '' }}</td>
                </tr>
                <tr>
                    <th style="width: 10em" class="text-white bg-primary">Username</th>
                    <td class="text-left">{{ $user->username ?? '' }}</td>
                </tr>
                <tr>
                    <th style="width: 10em" class="text-white bg-primary">Foto</th>
                    <td class="text-capitalize text-left">
                        @if (!empty($user->foto))
                            <img src="{{ asset('storage/avatars/' . $user->foto) }}"
                                 style="height: 100px; width: auto"
                                 alt="foto pengguna">
                        @else
                            <img src="{{ asset('images/picture_profile/default.svg') }}"
                                 style="height: 100px; width: auto"
                                 alt="foto pengguna">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width: 10em" class="text-white bg-primary">Bidang</th>
                    <td class="text-capitalize text-left">{{ $user->bidang->nama ?? '' }}</td>
                </tr>
                <tr>
                    <th style="width: 10em" class="text-white bg-primary">Sub Bidang</th>
                    <td class="text-capitalize text-left">{{ $user->subbidang->nama ?? '' }}</td>
                </tr>
                <tr>
                    <th style="width: 10em" class="text-white bg-primary">Jabatan</th>
                    <td class="text-capitalize text-left">{{ $user->jabatan->nama ?? ''}}</td>
                </tr>
                <tr>
                    <th style="width: 10em" class="text-white bg-primary">Pangkat</th>
                    <td class="text-capitalize text-left">{{ $user->pangkat->nama ?? '' }}</td>
                </tr>
                <tr>
                    <th style="width: 10em" class="text-white bg-primary">Tanda tangan</th>
                    <td class="text-capitalize text-left">
                        @if (!empty($user->digitalsign))
                            <img src="{{ asset('storage/' . $user->digitalsign) }}"
                                 style="height: 100px; width: auto"
                                 alt="ttd pengguna">
                        @else
                           -
                        @endif

                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@section('localcss')
    <style>
        @media only screen and (min-width: 992px) {
            .table-responsive{
                display: inline-table;
            }
        }
    </style>
@endsection
