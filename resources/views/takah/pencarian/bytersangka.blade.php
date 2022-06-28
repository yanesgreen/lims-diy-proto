@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-primary d-none d-md-block">Pencarian Takah By Tersangka</h4>
        <a class="btn btn-outline-primary" href="{{ route('takah.pencarian.index') }}" role="button">
            Kembali
        </a>
    </div>

    {{--Search Row--}}
    <div class="row mb-5">
        <div class="col-12 card-menu bg-primary p-3 rounded">
            <form action="{{ route('takah.pencarian.bytersangka') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-12 mt-4">
                        <h5 class="mb-3 text-white">Tersangka & Kasus</h5>
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text"
                               name="tersangka"
                               id="tersangka"
                               class="form-control"
                               placeholder="Nama Tersangka">
                    </div>
                    <div class="col-12 mb-3">
                        <select class="form-control select2"
                                id="jeniskasus_id"
                                name="jeniskasus_id"
                                style="width: 100%">
                            <option disabled selected value="">Pilih Jenis Kasus</option>
                            @if (!empty($jeniskasus))
                                @foreach ($jeniskasus as $index => $item)
                                    <option value="{{ $index }}">{{ $item }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4">
                        <h5 class="mb-3 text-white">Satuan Wilayah</h5>
                    </div>
                    <div class="col-12 mb-3">
                        <select class="form-control select2"
                                id="polda"
                                name="polda"
                                style="width: 100%"
                        >
                            <option value="" disabled selected>Pilih Polda</option>
                            @if (!empty($polda))
                                @foreach ($polda as $index => $item)
                                    <option value="{{ $index }}">{{ $item }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <select class="form-control select2" name="polres" id="polres" required>
                            <option value="" disabled selected>Pilih Polres</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <select class="form-control select2" name="polsek" id="polsek" required>
                            <option value="" disabled selected>Pilih Polsek</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="col-12 my-4 d-flex justify-content-end">
                        <button id="search" type="submit" class="btn btn-light" disabled>Cari Data</button>
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
    <script src="{{ asset('js/jquery.chained.min.js') }}"></script>
    <script src="{{ asset('js/jquery.chained.remote.js') }}"></script>
    <script>
        $(function () {

            // select2
            $('.select2').select2();

            // chained select
            $("#polres").remoteChained({
                parents: "#polda",
                url: "../../masterdata/polres/api/select"
            });

            $("#polsek").remoteChained({
                parents: "#polres",
                url: "../../masterdata/polsek/api/select"
            });

            // enable select
            $('#tersangka').on('keyup', function () {
                let value = $(this).val();
                if (value.length > 0) {
                    $('#search').removeAttr('disabled');
                }
            })

        });
    </script>
@endsection
