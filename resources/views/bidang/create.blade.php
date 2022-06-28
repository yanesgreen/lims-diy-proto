<form id="form-create" method="post" action="{{ route('bidang.store') }}">
    @csrf
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama</label>
        <input type="text" name="nama" class="form-control">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Singkatan</label>
        <input type="text" name="singkatan" class="form-control">
        <small id="helper-singkatan" class="form-text text-danger">{{ $errors->first('singkatan') }}</small>
    </div>
</form>
