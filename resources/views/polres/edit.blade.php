<form id="form-create" method="post" action="{{ route('polres.update', $polres->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama Polres</label>
        <input type="text" name="nama" class="form-control" value="{{ $polres->nama }}">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ $polres->alamat }}">
        <small id="helper-alamat" class="form-text text-danger">{{ $errors->first('alamat') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ $polres->telepon }}">
        <small id="helper-telepon" class="form-text text-danger">{{ $errors->first('telepon') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">
            Polda
        </label>
        <select class="form-control select2" id="selectPolda" name="polda_id" required>
            <option value="" disabled selected>Pilih Polda</option>
            @foreach ($polda as $index => $item)
                <option value="{{$index}}" {{ ($polres->polda_id == $index) ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-danger">
            {{ $errors->first('polda_id') }}
        </small>
    </div>
</form>
