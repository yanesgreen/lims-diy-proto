<form id="form-create" method="post" action="{{ route('pemeriksa.update', $pemeriksa->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama Pemeriksa</label>
        <input type="text" name="nama" class="form-control" value="{{ $pemeriksa->nama }}">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">NRP</label>
        <input type="text" name="nrp" class="form-control" value="{{ $pemeriksa->nrp }}">
        <small id="helper-nrp" class="form-text text-danger">{{ $errors->first('nrp') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">
            Bidang
        </label>
        <select class="form-control select2" id="selectBidang" name="bidang_id" required>
            <option value="" disabled selected>Pilih Bidang</option>
            @foreach ($bidang as $index => $item)
                <option value="{{$index}}" {{ ($pemeriksa->bidang_id == $index) ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-danger">
            {{ $errors->first('bidang_id') }}
        </small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">
            Pangkat
        </label>
        <select class="form-control select2" id="selectPangkat" name="pangkat_id" required>
            <option value="" disabled selected>Pilih Pangkat</option>
            @foreach ($pangkat as $index => $item)
                <option value="{{$index}}" {{ ($pemeriksa->pangkat_id == $index) ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-danger">
            {{ $errors->first('pangkat_id') }}
        </small>
    </div>
    {{--    <div class="form-group">--}}
    {{--        <label class="col-form-label text-lg-right">--}}
    {{--            Unit Kerja--}}
    {{--        </label>--}}
    {{--        <select class="form-control select2" id="selectUnitkerja" name="unitkerja_id" required>--}}
    {{--            <option value="" disabled selected>Pilih Unit Kerja</option>--}}
    {{--            @foreach ($unitkerja as $index => $item)--}}
    {{--                <option value="{{$index}}" {{ ($pemeriksa->unitkerja_id == $index) ? 'selected' : '' }}>--}}
    {{--                    {{ $item }}--}}
    {{--                </option>--}}
    {{--            @endforeach--}}
    {{--        </select>--}}
    {{--        <small class="form-text text-danger">--}}
    {{--            {{ $errors->first('unitkerja_id') }}--}}
    {{--        </small>--}}
    {{--    </div>--}}
</form>
