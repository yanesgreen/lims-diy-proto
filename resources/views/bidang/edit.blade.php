<form id="form-create" method="post" action="{{ route('bidang.update', $bidang->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $bidang->nama }}">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Singkatan</label>
        <input type="text" name="singkatan" class="form-control" value="{{ $bidang->singkatan }}">
        <small id="helper-singkatan" class="form-text text-danger">{{ $errors->first('singkatan') }}</small>
    </div>
</form>
