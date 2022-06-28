<form id="form-create" method="post" action="{{ route('satker.update', $satker->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $satker->nama }}">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
</form>
