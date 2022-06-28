@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Pencarian Takah</h4>
    </div>

    {{--Cards Row--}}
    <div class="row">

        <div class="col-md-6 mb-4">
            <a href="{{ route('dummies.takah.pencarian.bytakah') }}" style="text-decoration: none">
                <div class="card bg-primary pattern-overlay shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <h6 class="text-white mb-2">
                                        Pencarian Takah
                                    </h6>
                                    <div class="h5 mb-0 font-weight-bold text-info">
                                        By Penerimaan BB/Takah
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-search fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 mb-4">
            <a href="{{ route('dummies.takah.pencarian.bytersangka') }}" style="text-decoration: none">
                <div class="card bg-primary pattern-overlay shadow-raised h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1">
                                    <h6 class="text-white mb-2">
                                        Pencarian Takah
                                    </h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-info">
                                    By Tersangka
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-search fa-2x text-white-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
@endsection
