@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800 d-none d-md-block">Pencarian Takah By Tersangka</h4>
        <a class="btn btn-danger" href="{{ route('dummies.takah.pencarian') }}" role="button">
            Kembali
        </a>
    </div>

    {{--Cards Row--}}
    <div class="row mb-5">
        <div class="col-12 bg-primary pattern-overlay p-3 rounded">
            <form>
                <div class="row">
                    <div class="col-12 mt-3">
                        <h5 class="mb-3 text-white">Tersangka & Kasus</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="Nama Tersangka">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="Nama Kasus">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3">
                        <h5 class="mb-3 text-white">Satuan Wilayah</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <select class="form-control select2" name="" id="">
                            <option selected disabled>Pilih Polda</option>
                            <option>Polda A</option>
                            <option>Polda B</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <select class="form-control select2" name="" id="">
                            <option selected disabled>Pilih Polres</option>
                            <option>Polres A</option>
                            <option>Polres B</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <select class="form-control select2" name="" id="">
                            <option selected disabled>Pilih Polsek</option>
                            <option>Polsek A</option>
                            <option>Polsek B</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="col-12 mt-3 d-flex justify-content-end">
                        <button id="search" type="submit" class="btn btn-lims-gradient">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Table Search --}}
    <div class="row mb-5">
        <div class="col-12 overflow-hidden">
            <table id="table-search" class="table table-bordered d-none">
                <thead class="bg-primary text-white">
                <tr>
                    <th>No.</th>
                    <th>No. Takah</th>
                    <th>No. Penerimaan</th>
                    <th>Bidang</th>
                    <th>Sub Bidang</th>
                    <th>Tersangka</th>
                    <th>Kasus</th>
                    <th class="text-center">Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <tr>
                    <td>5</td>
                    <td>00004/NNF/2020/PUS</td>
                    <td>00004/01072020/PUS</td>
                    <td>Narkobafor</td>
                    <td>NNF</td>
                    <td>John Doe</td>
                    <td>Penyalahgunaan Noarkotika</td>
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
                </tbody>
            </table>
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
        // select2
        $('.select2').select2();

        //search--dummy
        $('#search').on('click', function (event) {
            event.preventDefault();
            $('#table-search').removeClass('d-none');
        })
    </script>
@endsection
