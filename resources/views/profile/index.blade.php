@extends('layouts.backend.default')

{{--html content utama--}}
@section('content')
    {{--Begin Page Content--}}
    <div class="container-fluid">

        {{--Page Heading--}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Profil Pengguna</h4>
        </div>

        {{--main--}}
        <div class="row mb-3">
            <div class="col-sm-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                           href="#nav-profil"
                           role="tab"
                           aria-controls="nav-profil" aria-selected="true">Profil
                        </a>
                        <a class="nav-item nav-link" id="nav-gantipassword-tab" data-toggle="tab"
                           href="#nav-gantipassword"
                           role="tab"
                           aria-controls="nav-gantipassword" aria-selected="false">Password
                        </a>
                    </div>
                </nav>


                <div class="tab-content" id="nav-tabContent">

                    {{--TAB PROFIL--}}
                    <div class="tab-pane fade show active bg-white p-2 rounded"
                         style="border-bottom: 1px solid lightgrey; border-left: 1px solid lightgrey; border-right: 1px solid lightgrey;"
                         id="nav-profil" role="tabpanel" aria-labelledby="nav-profil-tab">

                        {{--                        <!--Foto-->--}}
                        @if (auth::user()->foto)
                            <div class="text-center my-3">
                                <img src="{{ asset('storage/avatars/' . auth::user()->foto) }}"
                                     class="img-fluid rounded-circle shadow-sm avatar"
                                     style="height: 100px; width:100px"
                                     alt="foto pengguna">
                                <h5 class="text-primary mt-2 mb-4">{{  auth::user()->nama ?? '' }}</h5>
                            </div>
                        @else
                            <div class="text-center my-3">
                                <img src="{{ asset('images/picture_profile/default.svg') }}"
                                     class="img-fluid rounded-circle shadow-sm"
                                     style="height: 100px; width:100px"
                                     alt="foto pengguna">
                                <h5 class="text-primary mt-2 mb-4">{{  auth::user()->nama ?? '' }}</h5>
                            </div>
                        @endif

                        {{--Table--}}
                        <div class="table-container">
                            <table class="table table-bordered bg-light my-3">
                                <tr>
                                    <th>NRP/NIP</th>
                                    <td class="text-capitalize text-left">{{  auth::user()->nrp ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td class="text-capitalize text-left">{{  auth::user()->username ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td class="text-capitalize text-left">
                                        {{  auth::user()->role->nama ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bidang</th>
                                    <td class="text-capitalize text-left">{{  auth::user()->bidang->nama ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td class="text-capitalize text-left">{{  auth::user()->jabatan->nama ?? '' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    {{--TAB UBAH PASSWORD--}}
                    <div class="tab-pane fade bg-white p-2 rounded" id="nav-gantipassword"
                         style="border-bottom: 1px solid lightgrey; border-left: 1px solid lightgrey; border-right: 1px solid lightgrey;"
                         role="tabpanel" aria-labelledby="nav-contact-tab">
                        {{--form start--}}
                        <form id="formUpdatePassword" class="my-3 mx-md-3" method="post"
                              action="{{ route('profile.updatePassword', $user->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group mb-3">
                                <label for="password_lama">Password Lama</label>
                                <input
                                    type="password"
                                    name="password_lama"
                                    class="form-control"
                                    id="password_lama"
                                    required minlength="8" maxlength="20">
                                <small id="helper-password_lama" class="form-text text-danger"></small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password Baru</label>
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       id="password"
                                       required minlength="8" maxlength="20">
                                <small id="helper-password" class="form-text text-danger"></small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                       id="password_confirmation">
                                <small id="helper-password_confirmation" class="form-text text-danger"></small>
                            </div>
                            <button type="submit" id="btn-updatePassword" class="btn btn-primary">
                                Ubah Password
                                <i id="loader-password" class="fas fa-circle-notch fa-spin ml-2"
                                   style="display: none"></i>
                            </button>
                        </form>
                        {{--form end--}}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('modals')
    {{--Modal Sukses--}}
    <div class="modal fade" id="modalSukses" tabindex="-1" role="dialog" aria-labelledby="modalSukses"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 id="message" class="text-center mb-3"></h5>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
