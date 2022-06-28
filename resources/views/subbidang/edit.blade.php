<form id="form-create"
      method="post"
      action="{{ route('subbidang.update', ['bidang'=> $bidang->id, 'subbidang' => $subbidang->id]) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="col-form-label text-lg-right">Bidang</label>
        <input type="text" value="{{ $bidang->nama }}" class="form-control" disabled>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Nama Sub bidang</label>
        <input type="text" name="nama" class="form-control" value="{{ $subbidang->nama }}">
        <small id="helper-nama" class="form-text text-danger">
            {{ $errors->first('nama') }}
        </small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Singkatan Sub bidang</label>
        <input type="text" name="singkatan" class="form-control" value="{{ $subbidang->singkatan }}">
        <small id="helper-singkatan" class="form-text text-danger">
            {{ $errors->first('singkatan') }}
        </small>
    </div>
</form>
