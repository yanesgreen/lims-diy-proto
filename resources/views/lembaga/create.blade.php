<form id="form-create" method="post" action="{{ route('lembaga.store') }}">
    @csrf
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama</label>
        <input type="text" name="nama" class="form-control">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
</form>
