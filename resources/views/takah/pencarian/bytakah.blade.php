@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-primary d-none d-md-block">Pencarian Takah By Takah</h4>
        <a class="btn btn-outline-primary" href="{{ route('takah.pencarian.index') }}" role="button">
            Kembali
        </a>
    </div>

    {{--Search Row--}}
    <div class="row mb-5">
        <div class="col-12 bg-primary card-menu p-3 rounded">
            <form action="{{ route('takah.pencarian.bytakah') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-12 mt-3">
                        <h5 class="mb-3 text-white">Nomor Takah</h5>
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text"
                               class="form-control"
                               name="nomor"
                               placeholder="No Takah"
                               required>
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="col-12 my-3 d-flex justify-content-end">
                        <button id="search" type="submit" class="btn btn-light">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Table Search --}}
    <div class="row mb-5">
        <div class="col-12 overflow-hidden">
            @if (!empty($takah))
                <table id="table-search" class="table table-bordered">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th>No.</th>
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
                    @if ( count($takah) > 0 )
                        @foreach ($takah as $index => $result)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $result->nomor }}</td>
                                <td>{{ $result->bidang->nama }}</td>
                                <td>{{ $result->subbidang->kode }}</td>
                                <td>
                                    @foreach ($result->tersangka as $index => $tersangka)
                                        {{ $tersangka->nama }},
                                    @endforeach
                                </td>
                                <td>{{ $result->jeniskasus->nama }}</td>
                                <td>
                                <span class="badge badge-diserahkan-ke-urtu d-block">
                                    {{ $result->statustakah->nama }}
                                </span>
                                </td>
                                <td>
                                    <a role="button"
                                       class="btn-aksi badge"
                                       href="{{ route('takah.tahap', $result->id) }}">
                                        lihat
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">
                                data yang anda cari tidak ditemukan.
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            @endif

        </div>
    </div>
@endsection

@section('localcss')
    <style>
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.1s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: white;
            transition: all 0.1s ease;
        }

        .select2 {
            width: 100%;
        }

        .select2-container--default .select2-selection--single {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .select2-container--default .select2-selection--single:focus {
            outline: none;
        }

        .select2-search__field:focus {
            border: 1px solid #919191 !important;
            border-radius: 5px;
            outline: none;
        }

        .table td:last-child {
            text-align: center;
        }
    </style>
@endsection

@section('localscript')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            // select2
            $('.select2').select2();

        });
    </script>
@endsection
