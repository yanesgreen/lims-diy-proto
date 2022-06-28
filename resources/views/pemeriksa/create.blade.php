<form id="form-create" method="post" action="{{ route('pemeriksa.store') }}" onsubmit="return">
    @csrf
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama Pemeriksa</label>
        <input type="text" name="nama" class="form-control">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">NRP</label>
        <input type="text" name="nrp" class="form-control">
        <small id="helper-singkatan" class="form-text text-danger">{{ $errors->first('nrp') }}</small>
    </div>
    {{--Bidang--}}
    <div class="form-group">
        <label class="col-form-label text-lg-right">
            Bidang
        </label>
        <select class="form-control select2" id="bidang_id" name="bidang_id">
            <option value="" disabled selected>Pilih Bidang</option>
            @foreach ($bidang as $index => $item)
                @if(old('bidang_id') == $index )
                    <option value="{{$index}}" selected>{{ $item }}</option>
                @else
                    <option value="{{$index}}">{{ $item }}</option>
                @endif
            @endforeach
        </select>
        <small class="form-text text-danger">
            {{ $errors->first('bidang_id') }}
        </small>
    </div>
    {{--Pangkat--}}
    <div class="form-group">
        <label class="col-form-label text-lg-right">
            Pangkat
        </label>
        <select class="form-control select2" id="selectPangkat" name="pangkat_id">
            <option value="" disabled selected>Pilih Pangkat</option>
            @foreach ($pangkat as $index => $item)
                @if(old('pangkat_id') == $index )
                    <option value="{{$index}}" selected>{{ $item }}</option>
                @else
                    <option value="{{$index}}">{{ $item }}</option>
                @endif
            @endforeach
        </select>
        <small class="form-text text-danger">{{ $errors->first('pangkat_id') }}</small>
    </div>
    {{--Unit Kerja--}}
    {{--    <div class="form-group">--}}
    {{--        <label class="col-form-label text-lg-right">--}}
    {{--            Unit Kerja--}}
    {{--        </label>--}}
    {{--        <select class="form-control select2" id="selectUnitKerja" name="unitkerja_id">--}}
    {{--            <option value="" disabled selected>Pilih Unit Kerja</option>--}}
    {{--            @foreach ($unitkerja as $index => $item)--}}
    {{--                @if(old('unitkerja_id') == $index )--}}
    {{--                    <option value="{{$index}}" selected>{{ $item }}</option>--}}
    {{--                @else--}}
    {{--                    <option value="{{$index}}">{{ $item }}</option>--}}
    {{--                @endif--}}
    {{--            @endforeach--}}
    {{--        </select>--}}
    {{--        <small class="form-text text-danger">{{ $errors->first('unitkerja_id') }}</small>--}}
    {{--    </div>--}}
</form>
