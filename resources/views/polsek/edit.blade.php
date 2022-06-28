<form id="form-create" method="post" action="{{ route('polsek.update', $polsek->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama Polsek</label>
        <input type="text" name="nama" class="form-control" value="{{ $polsek->nama }}">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ $polsek->alamat }}">
        <small id="helper-alamat" class="form-text text-danger">{{ $errors->first('alamat') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ $polsek->telepon }}">
        <small id="helper-telepon" class="form-text text-danger">{{ $errors->first('telepon') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">
            Polres
        </label>
        <select class="form-control select2" id="selectPolres" name="polres_id" required>
            <option value="" disabled selected>Pilih Polres</option>
            @foreach ($polres as $index => $item)
                <option value="{{$index}}" {{ ($polsek->polres_id == $index) ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-danger">
            {{ $errors->first('polres_id') }}
        </small>
    </div>
</form>
