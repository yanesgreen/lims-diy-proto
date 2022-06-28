<form id="form-tambah-pemeriksa"
      action="{{ route('takah.update.pemeriksa', $takah->id) }}"
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
                @if ( !empty($takah->pemeriksa[0]) )
                    @foreach ($pemeriksa as $index => $item)
                        <option value="{{$index}}" {{ $index == $takah->pemeriksa[0]->id ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled selected>Pilih Pemeriksa</option>
                    @foreach ($pemeriksa as $index => $item)
                        <option value="{{$index}}">
                            {{ $item }}
                        </option>
                    @endforeach
                @endif
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
                @if ( !empty($takah->pemeriksa[1]) )
                    @foreach ($pemeriksa as $index => $item)
                        <option value="{{$index}}" {{ $index == $takah->pemeriksa[1]->id ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled selected>Pilih Pemeriksa</option>
                    @foreach ($pemeriksa as $index => $item)
                        <option value="{{$index}}">
                            {{ $item }}
                        </option>
                    @endforeach
                @endif
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
                @if ( !empty($takah->pemeriksa[2]) )
                    @foreach ($pemeriksa as $index => $item)
                        <option value="{{$index}}" {{ $index == $takah->pemeriksa[2]->id ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled selected>Pilih Pemeriksa</option>
                    @foreach ($pemeriksa as $index => $item)
                        <option value="{{$index}}">
                            {{ $item }}
                        </option>
                    @endforeach
                @endif
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
                @if ( !empty($takah->pemeriksa[3]) )
                    @foreach ($pemeriksa as $index => $item)
                        <option value="{{$index}}" {{ $index == $takah->pemeriksa[3]->id ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled selected>Pilih Pemeriksa</option>
                    @foreach ($pemeriksa as $index => $item)
                        <option value="{{$index}}">
                            {{ $item }}
                        </option>
                    @endforeach
                @endif
            </select>
            <small id="helper-pemeriksa4" class="form-text text-danger"></small>
        </div>
    </div>

    {{--Submit--}}
    <div class="d-flex justify-content-end mb-3">
        <button type="submit"
                class="btn btn-lims-gradient d-flex align-content-center">
            Simpan
            <i id="loader-tambah-pemeriksa"
               class="fas fa-circle-notch fa-spin ml-2 mt-1 text-danger"
               style="display: none">
            </i>
        </button>
    </div>

</form>

