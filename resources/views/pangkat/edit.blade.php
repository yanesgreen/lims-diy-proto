<form id="form-create" method="post" action="{{ route('pangkat.update', $pangkat->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama Pangkat</label>
        <input type="text" name="nama" class="form-control" value="{{ $pangkat->nama }}">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Singkatan Pangkat</label>
        <input type="text" name="nama" class="form-control" value="{{ $pangkat->singkatan }}">
        <small id="helper-singkatan" class="form-text text-danger">{{ $errors->first('singkatan') }}</small>
    </div>
</form>
