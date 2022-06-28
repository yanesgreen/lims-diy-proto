<form id="form-create" method="post" action="{{ route('polda.store') }}" onsubmit="return">
    @csrf
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama Polda</label>
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
        <input type="text" name="telepon" class="form-control">
        <small id="helper-telepon" class="form-text text-danger">{{ $errors->first('telepon') }}</small>
    </div>
</form>
