<div class="card">
    <div class="card-header bg-primary" id="headingFour">
        <h6 class="mb-0 text-white" id="collapseFour-text">
            5. Pemeriksa Forensik
        </h6>
    </div>
    <div>
        <div id="pemeriksa-container"
             class="card-body {{ ($takah->keteranganformiltambahan || $takah->keteranganteknistambahan) ? 'd-none' : '' }}">

            <form id="form-tambah-pemeriksa"
                  action="{{ route('takah.process.tambah_pemeriksa', $takah->id) }}"
                  method="post">
                @csrf
                @method('put')

                {{--Pemeriksa 1--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Nama Pemeriksa I
                    </label>
                    <div class="col-lg-10">
                        <select class="form-control select2"
                                id="pemeriksa1"
                                name="pemeriksa1"
                                style="width: 100%">
                            <option value="" disabled selected>Pilih Pemeriksa</option>
                            @foreach ($pemeriksa as $index => $item)
                                @if(old('pemeriksa1') == $index )
                                    <option value="{{$index}}" selected>{{ $item }}</option>
                                @else
                                    <option value="{{$index}}">{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                        <small id="helper-pemeriksa1" class="form-text text-danger"></small>
                    </div>
                </div>

                {{--Pemeriksa 2--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Nama Pemeriksa II
                    </label>
                    <div class="col-lg-10">
                        <select class="form-control select2"
                                id="pemeriksa2"
                                name="pemeriksa2"
                                style="width: 100%">
                            <option value="" disabled selected>Pilih Pemeriksa</option>
                            @foreach ($pemeriksa as $index => $item)
                                @if(old('pemeriksa2') == $index )
                                    <option value="{{$index}}" selected>{{ $item }}</option>
                                @else
                                    <option value="{{$index}}">{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                        <small id="helper-pemeriksa2" class="form-text text-danger"></small>
                    </div>
                </div>

                {{--Pemeriksa 3--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Nama Pemeriksa III
                    </label>
                    <div class="col-lg-10">
                        <select class="form-control select2"
                                id="pemeriksa3"
                                name="pemeriksa3"
                                style="width: 100%">
                            <option value="" disabled selected>Pilih Pemeriksa</option>
                            @foreach ($pemeriksa as $index => $item)
                                @if(old('pemeriksa3') == $index )
                                    <option value="{{$index}}" selected>{{ $item }}</option>
                                @else
                                    <option value="{{$index}}">{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                        <small id="helper-pemeriksa3" class="form-text text-danger"></small>
                    </div>
                </div>

                {{--Pemeriksa 4--}}
                <div class="form-group row">
                    <label for="select-jenisidentitas" class="col-lg-2 col-form-label text-lg-right">
                        Nama Pemeriksa IV
                    </label>
                    <div class="col-lg-10">
                        <select class="form-control select2"
                                id="pemeriksa4"
                                name="pemeriksa4"
                                style="width: 100%">
                            <option value="" disabled selected>Pilih Pemeriksa</option>
                            @foreach ($pemeriksa as $index => $item)
                                @if(old('pemeriksa4') == $index )
                                    <option value="{{$index}}" selected>{{ $item }}</option>
                                @else
                                    <option value="{{$index}}">{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                        <small id="helper-pemeriksa4" class="form-text text-danger"></small>
                    </div>
                </div>

                {{--Submit--}}
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit"
                            class="btn btn-primary d-flex align-content-center">
                        Simpan
                        <i id="loader-tambah-pemeriksa"
                           class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
                           style="display: none">
                        </i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

