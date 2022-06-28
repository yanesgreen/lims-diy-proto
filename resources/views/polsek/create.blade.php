<form id="form-create" method="post" action="{{ route('polsek.store') }}" onsubmit="return">
    @csrf
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama Polsek</label>
        <input type="text" name="nama" class="form-control">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Alamat</label>
        <input type="text" name="alamat" class="form-control">
        <small id="helper-alamat" class="form-text text-danger">{{ $errors->first('alamat') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Telepon</label>
        <input type="number" name="telepon" class="form-control">
        <small id="helper-telepon" class="form-text text-danger">{{ $errors->first('telepon') }}</small>
    </div>
    {{--polda--}}
    <div class="form-group">
        <label class="col-form-label text-lg-right">
            polres
        </label>
        <select class="form-control select2" id="polres_id" name="polres_id">
            <option value="" disabled selected>Pilih Polres</option>
            @foreach ($polres as $index => $item)
                @if(old('polres_id') == $index )
                    <option value="{{$index}}" selected>{{ $item }}</option>
                @else
                    <option value="{{$index}}">{{ $item }}</option>
                @endif
            @endforeach
        </select>
        <small class="form-text text-danger">
            {{ $errors->first('polres_id') }}
        </small>
    </div>
</form>
