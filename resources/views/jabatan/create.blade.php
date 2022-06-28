<form id="form-create" method="post" action="{{ route('jabatan.store') }}" onsubmit="return">
    @csrf
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama Jabatan</label>
        <input type="text" name="nama" class="form-control">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
</form>
