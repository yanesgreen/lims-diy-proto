@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Daftar Takah - Tahap II
        </h4>
    </div>

    {{-- Table --}}
    <div class="row mb-5">
        <div class="col-12 overflow-hidden">
            <table id="table-kaurmin" class="table table-bordered">
                <thead class="bg-primary text-white">
                <tr>
                    <th style="width: 5%">No.</th>
                    <th width="20%">No. Takah</th>
                    <th class="text-center">Status</th>
                    <th width="10%">Aksi</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <tr>
                    <td>1</td>
                    <td>000001/NNF/2020/PUS</td>
                    <td>
                        Penerimaan Barang Bukti Dari Urtu
                    </td>
                    <td>
                        <a role="button"
                           class="btn-aksi badge"
                           href="{{ route('dummies.takah.tahap.tahap2a') }}" class="no-takah">
                            lihat form
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>000002/NNF/2020/PUS</td>
                    <td>
                        Penyerahan BAP Lab dan Barang Bukti Ke Urtu
                    </td>
                    <td>
                        <a role="button"
                           class="btn-aksi badge"
                           href="{{ route('dummies.takah.tahap.tahap2b') }}" class="no-takah">
                            lihat form
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('localscript')
    <script>
        $(document).ready(function () {
          $('#table-kaurmin').dataTable();
        })
    </script>
@endsection

