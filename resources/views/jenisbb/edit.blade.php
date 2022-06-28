<form id="form-create" method="post" action="{{ route('jenisbb.update', $jenisbb->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="col-form-label text-lg-right">Jenis Barang Bukti</label>
        <input type="text" name="nama" class="form-control" value="{{ $jenisbb->nama }}">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" value="{{ $jenisbb->keterangan }}">
        <small id="helper-keterangan" class="form-text text-danger">{{ $errors->first('keterangan') }}</small>
    </div>
</form>
