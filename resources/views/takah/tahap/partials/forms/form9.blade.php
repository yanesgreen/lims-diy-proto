<div class="card">
    <div class="card-header bg-primary" id="headingFour">
        <h6 class="mb-0 text-white">
            9. Feedback
        </h6>
    </div>
    <div>
        <div id="form-feedback-container" class="card-body" style="display: none">
            <form id="form-simpan-feedback"
                  action="{{ route('takah.process.simpan_feedback', $takah->id) }}"
                  method="post">
                @csrf
                @method('put')

                {{--Pertanyaan 1--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Pertanyaan 1:
                    </label>
                    <div class="col-lg-10">
                        <label class="col-form-label">
                            Petugas labfor ramah dalam pelayanannya?
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan1" value="1">
                            <label class="form-check-label">
                                Sangat Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan1" value="2">
                            <label class="form-check-label">
                                Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan1" value="3">
                            <label class="form-check-label">
                                Kurang Puas
                            </label>
                        </div>
                    </div>
                </div>

                {{--Pertanyaan 2--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Pertanyaan 2:
                    </label>
                    <div class="col-lg-10">
                        <label class="col-form-label">
                            Petugas labfor tepat waktu dalam pelayanannya?
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan2" value="1">
                            <label class="form-check-label">
                                Sangat Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan2" value="2">
                            <label class="form-check-label">
                                Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan2" value="3">
                            <label class="form-check-label">
                                Kurang Puas
                            </label>
                        </div>
                    </div>
                </div>

                {{--Pertanyaan 3--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Pertanyaan 3:
                    </label>
                    <div class="col-lg-10">
                        <label class="col-form-label">
                            Petugas labfor cepat datang bila diminta bantuan pemeriksaan?
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan3" value="1">
                            <label class="form-check-label">
                                Sangat Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan3" value="2">
                            <label class="form-check-label">
                                Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan3" value="3">
                            <label class="form-check-label">
                                Kurang Puas
                            </label>
                        </div>
                    </div>
                </div>

                {{--Pertanyaan 4--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Pertanyaan 4:
                    </label>
                    <div class="col-lg-10">
                        <label class="col-form-label">
                            Petugas labfor terampil melakukan pemeriksaan di lapangan?
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan4" value="1">
                            <label class="form-check-label">
                                Sangat Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan4" value="2">
                            <label class="form-check-label">
                                Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan4" value="3">
                            <label class="form-check-label">
                                Kurang Puas
                            </label>
                        </div>
                    </div>
                </div>

                {{--Pertanyaan 5--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Pertanyaan 5:
                    </label>
                    <div class="col-lg-10">
                        <label class="col-form-label">
                            Petugas labfor mudah dihubungi oleh Penyidik?
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan5" value="1">
                            <label class="form-check-label">
                                Sangat Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan5" value="2">
                            <label class="form-check-label">
                                Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan5" value="3">
                            <label class="form-check-label">
                                Kurang Puas
                            </label>
                        </div>
                    </div>
                </div>

                {{--Pertanyaan 6--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Pertanyaan 6:
                    </label>
                    <div class="col-lg-10">
                        <label class="col-form-label">
                            Aplikasi LIMS berbasis Standar SMILE bermanfaat dalam transparansi pemeriksaan?
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan6" value="1">
                            <label class="form-check-label">
                                Sangat Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan6" value="2">
                            <label class="form-check-label">
                                Puas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan6" value="3">
                            <label class="form-check-label">
                                Kurang Puas
                            </label>
                        </div>
                    </div>
                </div>

                {{--submit--}}
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-primary d-flex align-content-center">
                        Simpan
                        <i id="loader-simpan-feedback"
                           class="fas fa-circle-notch fa-spin ml-2 mt-1"
                           style="display: none">
                        </i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

