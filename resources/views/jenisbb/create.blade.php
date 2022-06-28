<form id="form-create" method="post" action="{{ route('jenisbb.store') }}">
    @csrf
    <div class="form-group">
        <label class="col-form-label text-lg-right">Jenis Barang Bukti</label>
        <input type="text" name="nama" class="form-control">
        <small id="helper-nama" class="form-text text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">Keterangan</label>
        <input type="text" name="keterangan" class="form-control">
        <small id="helper-keterangan" class="form-text text-danger">{{ $errors->first('keterangan') }}</small>
    </div>
    <div class="form-group">
        <label class="col-form-label text-lg-right">
            Bidang
        </label>
        <select class="form-control select2" id="selectBidang" name="bidang_id">
            <option value="" disabled selected>Pilih Bidang</option>
            @foreach ($bidang as $index => $item)
                @if(old('bidang_id') == $index )
                    <option value="{{$index}}" selected>{{ $item }}</option>
                @else
                    <option value="{{$index}}">{{ $item }}</option>
                @endif
            @endforeach
        </select>
        <small class="form-text text-danger">{{ $errors->first('bidang_id') }}</small>
    </div>
</form>
