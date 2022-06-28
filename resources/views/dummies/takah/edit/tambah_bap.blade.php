@extends('layouts.backend.default')

@section('content')
    {{--Page Heading--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">
            Upload BAP
        </h4>
    </div>

    {{--forms--}}
    <div class="shadow mb-3">
        <div class="card">
            <div class="card-header bg-primary" id="headingOne">
                <div class="d-flex justify-content-between">
                    <p class="mb-0 text-white" id="collapseOne-text">
                        Form Upload BAP
                    </p>
                </div>
            </div>
            <div class="card-body">
                {{--BAP--}}
                <div class="form-group row mb-0">
                    <label class="col-lg-2 col-form-label text-lg-right">File BAP</label>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <input type="file"
                                   class="form-control-file"
                                   name=""
                                   id=""
                                   placeholder=""
                                   aria-describedby="fileHelpId"
                                   accept=".pdf">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-lims-gradient align-content-center ml-2"
                            data-toggle="modal"
                            data-target="#modalsukses">
                        Upload BAP
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('modals')
    <!-- Modal -->
    <div class="modal fade"
         id="modalsukses"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modalsukses"
         data-backdrop="static"
         data-keyboard="false"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <span class="d-block mb-2">
                        <i class="fas fa-check-circle fa-5x text-lims-gradient"></i>
                    </span>
                    <h5 class="mb-1 font-weight-light text-muted">
                        File BAP Berhasil Di Upload
                    </h5>
                    <p class="mb-3">
                        Pemeriksaan Lab Telah Selesai, Serahkan Takah kembali Ke Urtu?
                    </p>
                    <hr>
                    <a role="button" href="{{ route("dummies.takah.index", ["status" => 5])}}"
                       class="btn btn-lims-gradient">
                        Serahkan Takah Ke Urtu.
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection



