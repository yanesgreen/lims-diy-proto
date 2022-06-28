@extends('layouts.backend.default')

@section('content')
    {{--Judul halaman--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-primary">Dashboard Admin</h4>
    </div>

    {{--storage:link--}}
    @if (session('success'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-primary" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
            </div>
        </div>
    @endif


    {{--Cards--}}
    <div class="row">

        <div class="col-lg-4 col-md-2 mb-4">
            <a href="{{ route('pengguna.index') }}" style="text-decoration: none">
                <div class="card card-menu bg-primary shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <div class="line"></div>
                                    <h6 class="text-white mb-0">Users</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">{{ $jumlah_users }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-2 mb-4">
            <a href="{{ route('pemeriksa.index') }}" style="text-decoration: none">
                <div class="card card-menu bg-primary shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <div class="line"></div>
                                    <h6 class="text-white mb-0">Pemeriksa Forensik</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">{{ $jumlah_pemeriksa }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-secret fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-2 mb-4">
            <a href="{{ route('jeniskasus.index') }}" style="text-decoration: none">
                <div class="card card-menu bg-primary shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <div class="line"></div>
                                    <h6 class="text-white mb-0">Jenis Kasus</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">{{ $jumlah_jeniskasus }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-briefcase fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-2 mb-4">
            <a href="{{ route('jenisbb.index') }}" class="text-decoration-none">
                <div class="card card-menu bg-primary shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <div class="line"></div>
                                    <h6 class="text-white mb-0">Jenis Barang Bukti</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">{{ $jumlah_jenisbb }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tag fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-2 mb-4">
            <a href="{{ route('lembaga.index') }}" class="text-decoration-none">
                <div class="card card-menu bg-primary shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <div class="line"></div>
                                    <h6 class="text-white mb-0">Lembaga Non-POLRI</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">
                                    {{ $jumlah_lembaga }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-2 mb-4">
            <a href="{{ route('satker.index') }}" class="text-decoration-none">
                <div class="card card-menu bg-primary shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <div class="line"></div>
                                    <h6 class="text-white mb-0">Satker Mabes POLRI</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">
                                    {{ $jumlah_satker }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-building fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

		<div class="col-lg-4 col-md-2 mb-4">
            <a href="{{ route('polda.index') }}" class="text-decoration-none">
                <div class="card card-menu bg-primary shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <div class="line"></div>
                                    <h6 class="text-white mb-0">Polda</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">
                                    {{ $jumlah_polda }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-building fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

		<div class="col-lg-4 col-md-2 mb-4">
            <a href="{{ route('polres.index') }}" class="text-decoration-none">
                <div class="card card-menu bg-primary shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <div class="line"></div>
                                    <h6 class="text-white mb-0">Polres</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">
                                    {{ $jumlah_polres }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-building fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
		<div class="col-lg-4 col-md-2 mb-4">
            <a href="{{ route('polsek.index') }}" class="text-decoration-none">
                <div class="card card-menu bg-primary shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <div class="line"></div>
                                    <h6 class="text-white mb-0">Polsek</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">
                                    {{ $jumlah_polsek }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-building fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
@endsection


